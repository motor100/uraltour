<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

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
}
