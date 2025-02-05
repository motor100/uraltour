<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\ProductGallery;
use App\Models\ProductDescription;
use \App\Models\Category;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;
// use Illuminate\Validation\Rule;
use Illuminate\View\View;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     * 
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\View\View
     */
    public function index(Request $request): View
    {
        $search_query = $request->input('search_query');

        $products = '';

        if($search_query) {
            $search_query = htmlspecialchars($search_query);
            $products = Product::where('title', 'like', "%{$search_query}%");
                               
        } else {
            $products = Product::orderBy('id', 'desc');                               
        }

        $products = $products->paginate(20)->onEachSide(1);

        return view('dashboard.products', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     * 
     * @return \Illuminate\View\View
     */
    public function create(): View
    {
        $categories = Category::all();

        return view('dashboard.products-create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     * 
     * @param  \Illuminate\Http\Request $request
     * @return Illuminate\Http\RedirectResponse
     */
    public function store(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'title' => 'required|min:2|max:250',
            'text_json' => 'required|min:2|max:65535',
            'category' => 'required',
            'input-main-file' => [
                                'nullable',
                                \Illuminate\Validation\Rules\File::types(['jpg', 'png'])
                                                                    ->min(10)
                                                                    ->max(3000)
                                ],
            'input-gallery-file' => 'nullable|max:4',
            'input-gallery-file.*' => [
                                \Illuminate\Validation\Rules\File::types(['jpg', 'png'])
                                                                    ->min(10)
                                                                    ->max(3000)
                                ],
            'start_date' => 'nullable',
            'price' => 'required|integer|min:1|max:500000',
        ]);

        $slug = Str::slug($validated['title']);

        // Проверка на уникальный slug
        $slug = (new \App\Services\Slug(Product::query(), $slug))->check();

        $html = (new \App\Services\JsonToHtml($validated['text_json']))->render();

        // Массив для вставки в модель \App\Models\Product
        $product_array = [
            'title' => $validated['title'],
            'slug' => $slug,
            'category_id' => $validated['category'],
            'image' => (new \App\Services\ProductImage($validated))->create(),
            'price' => $validated['price'],
        ];

        $product = Product::create($product_array);

        // Описание
        $description_array = [
            'product_id' => $product->id,
            'text_json' => $validated['text_json'],
            'text_html' => $html,
        ];

        ProductDescription::create($description_array);

        // Галерея
        if(array_key_exists('gallery', $validated)) {
            $gallery_array = [];
            foreach($validated['gallery'] as $gl) {
                $gallery_item = [];
                $gallery_item["product_id"] = $product->id;
                $gallery_item["image"] = (new \App\Services\ProductGallery($gl))->create();
                $gallery_item["created_at"] = now();
                $gallery_item["updated_at"] = now();
                $gallery_array[] = $gallery_item;
            }

            ProductGallery::insert($gallery_array);
        }

        return redirect()->route('dashboard.products');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     * 
     * @param int $id
     * @return \Illuminate\View\View
     */
    public function edit(string $id): View
    {
        $product = Product::findOrFail($id);

        // Категории
        $categories = Category::all();

        // Текущая категория
        $current_category = Category::where('id', $product->category_id)->first();

        // Передача данных в редактор Editor JS
        $to_editorjs = $product->description->text_json;

        return view('dashboard.products-edit', compact('product', 'categories', 'current_category', 'to_editorjs'));
    }

    /**
     * Update the specified resource in storage.
     * 
     * @param  \Illuminate\Http\Request $request
     * @param  int  $id
     * @return Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, string $id): RedirectResponse
    {
        $validated = $request->validate([
            'title' => 'required|min:2|max:250',
            'category' => 'required',
            'text_json' => 'required|min:2|max:65535',
            'input-main-file' => [
                                'nullable',
                                \Illuminate\Validation\Rules\File::types(['jpg', 'png'])
                                                                    ->min(10)
                                                                    ->max(3000)
                                ],
            'input-gallery-file' => 'nullable|max:4',
            'input-gallery-file.*' => [
                                \Illuminate\Validation\Rules\File::types(['jpg', 'png'])
                                                                    ->min(10)
                                                                    ->max(3000)
                                ],
            'price' => 'required|integer|min:1|max:500000',
            'start_date' => 'nullable',
            'delete_gallery' => 'nullable',
        ]);

        $product = Product::findOrFail($id);

        $slug = Str::slug($validated['title']);

        if($slug != $product->slug) {
            // Проверка на уникальный slug
            $slug = (new \App\Services\Slug(Product::query(), $slug))->check();            
        }

        $html = (new \App\Services\JsonToHtml($validated['text_json']))->render();

        if (isset($validated['input-main-file'])) {
            if (Storage::disk('public')->exists($product->image)) {
                Storage::disk('public')->delete($product->image);
            }
            $image = (new \App\Services\ProductImage($validated))->update($product);
        } else {
            $image = $product->image;
        }

        // Обновление описания
        $description_array = [
            'product_id' => $product->id,
            'text_json' => $validated['text_json'],
            'text_html' => $html,
        ];

        ProductDescription::where('product_id', $product->id)->update($description_array);

        // Удаление старой галереи
        if ($validated['delete_gallery']) {
            // Удаление файлов gallery images 
            foreach($product->gallery as $gl) {
                if (Storage::disk('public')->exists($gl->image)) {
                    Storage::disk('public')->delete($gl->image);
                }
                $gl->delete();
            }
        }
        
        // Вставка новых моделей галереи
        if(isset($validated['input-gallery-file'])) {
            $old_gallery = ProductGallery::where('product_id', $id)->get();
            foreach($old_gallery as $gl) {
                if (Storage::disk('public')->exists($gl->image)) {
                    Storage::disk('public')->delete($gl->image);
                }
            }

            ProductGallery::where('product_id', $id)->delete();

            // Вставка новых записей галереи
            $gallery_array = [];

            $gallery = $validated['input-gallery-file'];

            foreach($gallery as $gl) {
                $gallery_item = [];
                $gallery_item["product_id"] = $id;
                $gallery_item["image"] = (new \App\Services\ProductGallery($gl))->create();
                $gallery_item["created_at"] = now();
                $gallery_item["updated_at"] = now();
                $gallery_array[] = $gallery_item;
            }

            ProductGallery::insert($gallery_array);
        }

        $product_array = [
            'title' => $validated['title'],
            'slug' => $slug,
            'category_id' => $validated['category'],
            'image' => $image,
            'price' => $validated['price'],
        ];

        $product->update($product_array);

        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     * 
     * @param int $id
     * @return Illuminate\Http\RedirectResponse
     */
    public function destroy(string $id): RedirectResponse
    {
        $product = Product::findOrFail($id);

        // Удаление файла product image
        if (Storage::disk('public')->exists($product->image)) {
            Storage::disk('public')->delete($product->image);
        }

        // Удаление файлов gallery images
        if ($product->gallery) {
            foreach ($product->gallery as $gl) {
                if (Storage::disk('public')->exists($gl->image)) {
                    Storage::disk('public')->delete($gl->image);
                }
            }
        }

        // Удаление модели описания
        ProductDescription::where('product_id', $id)->delete();

        // Удаление модели галереи
        ProductGallery::where('product_id', $id)->delete();

        // Удаление модели Product
        $product->delete();

        return redirect()->back();
    }
}
