<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\ProductGallery;
use App\Models\ProductPhoto;
use App\Models\ProductDescription;
use App\Models\ProductProgram;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;

class ProductArchiveController extends Controller
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

        $products = $products->onlyTrashed()->paginate(20)->onEachSide(1);

        return view('dashboard.products-archive', compact('products'));
    }

    /**
     * Display the specified resource.
     * 
     * @param string $id
     * @return \Illuminate\View\View
     */
    public function show(string $id): View
    {
        $product = Product::where('id', $id)->withTrashed()->first();

        return view('dashboard.products-archive-show', compact('product'));
    }

    /**
     * Restore the specified resource.
     * 
     * @param string $id
     * @return Illuminate\Http\RedirectResponse
     */
    public function restore(string $id): RedirectResponse
    {
        $product = Product::where('id', $id)->withTrashed()->first();

        // Восстановление модели Product
        $product->restore();
        
        return redirect()->back();
    }

    /**
     * Destroy the specified resource.
     * 
     * @param string $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(string $id): RedirectResponse
    {
        $product = Product::where('id', $id)->withTrashed()->first();

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

        // Удаление модели программы
        ProductProgram::where('product_id', $id)->delete();

        // Удаление модели галереи
        ProductGallery::where('product_id', $id)->delete();

        // Удаление модели фото
        ProductPhoto::where('product_id', $id)->delete();

        // Удаление товара
        // Удаление через DB (Query Builder). Если сделать $product->delete() (Eloquent), то будет soft delete
        DB::table('products')->where('id', $product->id)->delete();

        return redirect()->route('dashboard.products-archive');
    }
}
