<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\ProductGallery;
use App\Models\ProductPhoto;
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
        // Категории
        $categories = Category::all();

        // Рекомендации
        $recommendations = \App\Models\Recommendation::all();

        // Оплата
        $payments = \App\Models\Payment::all();

        return view('dashboard.products-create', compact('categories', 'recommendations', 'payments'));
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
            'recommendation' => 'nullable',
            'payment' => 'nullable',
            'category' => 'required',
            'regular' => 'nullable',
            'input-main-file' => [
                                'required',
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
            'input-photo-file' => 'nullable|max:6',
            'input-photo-file.*' => [
                                \Illuminate\Validation\Rules\File::types(['jpg', 'png'])
                                                                    ->min(10)
                                                                    ->max(3000)
                                ],
            'start_date' => 'required_without:regular',
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
            'start_date' => isset($validated['start_date']) ? $validated['start_date'] : NULL,
            'price' => $validated['price'],
            'regular' => isset($validated['regular']) ? 1 : 0,
        ];

        $product = Product::create($product_array);

        // Описание
        $description_array = [
            'product_id' => $product->id,
            'text_json' => $validated['text_json'],
            'text_html' => $html,
            'recommendation_id' => isset($validated['recommendation']) ? $validated['recommendation'] : NULL,
            'payment_id' => isset($validated['payment']) ? $validated['payment'] : NULL,
        ];

        ProductDescription::create($description_array);

        // Галерея
        if(array_key_exists('input-gallery-file', $validated)) {
            $gallery_array = [];
            foreach($validated['input-gallery-file'] as $gl) {
                $gallery_item = [];
                $gallery_item["product_id"] = $product->id;
                $gallery_item["image"] = (new \App\Services\ProductGallery($gl))->create();
                $gallery_item["created_at"] = now();
                $gallery_item["updated_at"] = now();
                $gallery_array[] = $gallery_item;
            }

            ProductGallery::insert($gallery_array);
        }

        // Фото
        if(array_key_exists('input-photo-file', $validated)) {
            $photo_array = [];
            foreach($validated['input-photo-file'] as $gl) {
                $photo_item = [];
                $photo_item["product_id"] = $product->id;
                $photo_item["image"] = (new \App\Services\ProductPhoto($gl))->create();
                $photo_item["created_at"] = now();
                $photo_item["updated_at"] = now();
                $photo_array[] = $photo_item;
            }

            ProductPhoto::insert($photo_array);
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

        // Рекомендации
        $recommendations = \App\Models\Recommendation::all();

        // Оплата
        $payments = \App\Models\Payment::all();

        return view('dashboard.products-edit', compact('product', 'categories', 'recommendations', 'payments', 'current_category', 'to_editorjs'));
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
            'regular' => 'nullable',
            'text_json' => 'required|min:2|max:65535',
            'recommendation' => 'nullable',
            'payment' => 'nullable',
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
            'input-photo-file' => 'nullable|max:6',
            'input-photo-file.*' => [
                                \Illuminate\Validation\Rules\File::types(['jpg', 'png'])
                                                                    ->min(10)
                                                                    ->max(3000)
                                ],
            'price' => 'required|integer|min:1|max:500000',
            'start_date' => 'required_without:regular',
            'delete_gallery' => 'nullable',
            'delete_photo' => 'nullable',
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
            'recommendation_id' => isset($validated['recommendation']) ? $validated['recommendation'] : NULL,
            'payment_id' => isset($validated['payment']) ? $validated['payment'] : NULL,
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

        // Удаление старых фото
        if ($validated['delete_photo']) {
            // Удаление файлов photo images 
            foreach($product->photos as $gl) {
                if (Storage::disk('public')->exists($gl->image)) {
                    Storage::disk('public')->delete($gl->image);
                }
                $gl->delete();
            }
        }

        // Вставка новых моделей фото
        if(isset($validated['input-photo-file'])) {
            $old_photo = ProductPhoto::where('product_id', $id)->get();
            foreach($old_photo as $gl) {
                if (Storage::disk('public')->exists($gl->image)) {
                    Storage::disk('public')->delete($gl->image);
                }
            }

            ProductPhoto::where('product_id', $id)->delete();

            // Вставка новых записей фото
            $photo_array = [];

            $photo = $validated['input-photo-file'];

            foreach($photo as $gl) {
                $photo_item = [];
                $photo_item["product_id"] = $id;
                $photo_item["image"] = (new \App\Services\ProductPhoto($gl))->create();
                $photo_item["created_at"] = now();
                $photo_item["updated_at"] = now();
                $photo_array[] = $photo_item;
            }

            ProductPhoto::insert($photo_array);
        }

        $product_array = [
            'title' => $validated['title'],
            'slug' => $slug,
            'category_id' => $validated['category'],
            'image' => $image,
            'start_date' => isset($validated['start_date']) ? $validated['start_date'] : NULL,
            'price' => $validated['price'],
            'regular' => isset($validated['regular']) ? 1 : 0,
        ];

        $product->update($product_array);

        return redirect()->back();
    }

    /**
     * Soft delete
     * 
     * @param int $id
     * @return Illuminate\Http\RedirectResponse
     */
    public function destroy(string $id): RedirectResponse
    {
        $product = Product::findOrFail($id);

        /*
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

        // Удаление файлов photo images
        if ($product->photo) {
            foreach ($product->photo as $gl) {
                if (Storage::disk('public')->exists($gl->image)) {
                    Storage::disk('public')->delete($gl->image);
                }
            }
        }

        // Удаление модели описания
        ProductDescription::where('product_id', $id)->delete();

        // Удаление модели галереи
        ProductGallery::where('product_id', $id)->delete();

        // Удаление модели фото
        ProductPhoto::where('product_id', $id)->delete();
        */

        // Удаление модели Product
        $product->delete();

        return redirect()->back();
    }
}
