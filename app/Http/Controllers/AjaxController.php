<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
// use Illuminate\View\View;
// use Illuminate\Http\RedirectResponse;
use Illuminate\Http\JsonResponse;
// use App\Models\Category;
use App\Models\Product;


class AjaxController extends Controller
{
    /**
     * Ajax product search Поиск товаров
     * 
     * @param Illuminate\Http\Request
     * @return Illuminate\Http\JsonResponse
     */
    public function product_search(Request $request): JsonResponse
    {
        $search_query = $request->input('search_query');

        if (!$search_query) {
            return response()->json([]);
        }

        $search_query = htmlspecialchars($search_query);

        $products = Product::where('title', 'like', "%{$search_query}%") // поиск по названию товара
                            // ->orWhere('text_html', 'like', "%{$search_query}%") // поиск по тексту
                            ->with('category')
                            ->get();

        foreach($products as $product) {
            $product->storage_image = \Illuminate\Support\Facades\Storage::url($product->image);
            $product->date = $product->start_date->format("d.m.Y");
        }

        return response()->json($products);
    }
}
