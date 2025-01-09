<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;
use App\Models\Category;
use App\Models\Product;

class MainController extends Controller
{
    /**
     * Главная
     * 
     * @param
     * @return Illuminate\View\View
     */
    public function home(): View
    {
        return view('home');
    }

    /**
     * Каталог
     * 
     * @param
     * @return Illuminate\Http\View
     */
    public function catalog(): View
    {
        return view('catalog');
    }

    /**
     * Категория каталога
     * 
     * @param App\Models\Category
     * @return Illuminate\View\View
     */
    public function category(Category $category = null): View
    {
        if ($category) {

            $products = Product::where('category_id', $category->id)->paginate(8);

            $regular_products = Product::where('category_id', $category->id)->limit(2)->get();

            return view('category', compact('category', 'products', 'regular_products'));
        }

        return abort(404);
    }

    /**
     * Карточка товара
     * 
     * @param App\Models\Category
     * @param App\Models\Product
     * @return mixed
     */
    public function product(Category $category = null, Product $product = null): mixed
    {
        // Если есть модели Category и Product и товар из этой категории $product->category_id == $category->id
        if ($category && $product && $product->category_id == $category->id) {

            return view('product', compact('category', 'product'));
        }

        return abort(404);
    }

    /**
     * Поиск
     * 
     * @param Illuminate\Http\Request
     * @return Illuminate\View\View
     */
    public function poisk(Request $request): View
    {
        $validated = $request->validate([
            'search_query' => 'nullable|min:3|max:40'
        ]);

        $search_query = htmlspecialchars($validated['search_query']);

        $validated['search_query'] = htmlspecialchars($validated['search_query']);

        $products = Product::where('title', 'like', "%{$validated['search_query']}%")
                            // ->orWhere('text_html', 'like', "%{$validated['search_query']}%") // поиск по тексту
                            ->paginate(40)
                            ->onEachSide(1)
                            ->withQueryString();

        return view('poisk', compact('products', 'search_query'));
    }

    /**
     * Контакты
     * 
     * @param
     * @return Illuminate\View\View
     */
    public function contacts(): View
    {
        return view('contacts');
    }

    /**
     * Документы
     * 
     * @param
     * @return Illuminate\View\View
     */
    public function documents(): View
    {
        return view('documents');
    }

    /**
     * Политика конфиденциальности
     * 
     * @param
     * @return Illuminate\View\View
     */
    public function privacy_policy(): View
    {
        return view('privacy-policy');
    }

    /**
     * Пользовательское соглашение
     * 
     * @param
     * @return Illuminate\View\View
     */
    public function agreement(): View
    {
        return view('agreement');
    }
}
