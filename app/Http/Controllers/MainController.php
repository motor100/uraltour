<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;
use App\Models\Category;
use App\Models\Product;

class MainController extends Controller
{
    public function home(): View
    {
        return view('home');
    }

    public function catalog(): RedirectResponse
    {
        return redirect(route('home'));
    }

    public function category(Category $category = null): View
    {
        if ($category) {

            $products = Product::where('category_id', $category->id)->paginate(8);

            $regular_products = Product::where('category_id', $category->id)->limit(2)->get();

            return view('category', compact('category', 'products', 'regular_products'));
        }

        return abort(404);
    }

    public function product(Category $category = null, Product $product = null): mixed
    {
        // Если есть модели Category и Product и товар из этой категории $product->category_id == $category->id
        if ($category && $product && $product->category_id == $category->id) {

            return view('product', compact('category', 'product'));
        }

        return abort(404);
    }



    public function privacy_policy(): View
    {
        return view('privacy-policy');
    }

    public function agreement(): View
    {
        return view('agreement');
    }
}
