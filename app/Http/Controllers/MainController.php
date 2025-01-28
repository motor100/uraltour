<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\View\View;
// use Illuminate\Http\RedirectResponse;
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
        // Категории
        $categories = \App\Models\Category::all();
        
        // Отзывы
        $testimonials = \App\Models\Testimonial::whereNotNull('product_id')
                                                ->whereNotNull('publicated_at')
                                                ->orderBy('created_at', 'DESC')
                                                ->limit(6)
                                                ->get();

        // Удаление галереи
        foreach($testimonials as $testimonial) {
            $testimonial->gallery = [];
        }
        
        return view('home', compact('categories', 'testimonials'));
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

            $products = Product::where('category_id', $category->id)->paginate(9);

            foreach($products as $product) {
                $product->excerpt = (new \App\Services\Excerpt($product->description->text_html, 65))->create();
            }

            $regular_products = Product::where('category_id', $category->id)->limit(2)->get();

            foreach($regular_products as $product) {
                $product->excerpt = (new \App\Services\Excerpt($product->description->text_html, 65))->create();
            }

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

            // Отзывы
            $testimonials = \App\Models\Testimonial::where('product_id', $product->id)
                                                    ->whereNotNull('publicated_at')
                                                    ->orderBy('created_at', 'DESC')
                                                    ->paginate(10);

            return view('product', compact('product', 'testimonials'));
        }

        return abort(404);
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
     * Поиск
     * 
     * @param Illuminate\Http\Request
     * @return mixed
     */
    public function poisk(Request $request): mixed
    {
        $search_query = $request->input('search_query');

        if (mb_strlen($search_query) < 3 || mb_strlen($search_query) > 40) {
            return redirect('/');
        }

        $search_query = htmlspecialchars($search_query);

        if (!$search_query) {
            return redirect('/');
        }

        $products = Product::where('title', 'like', "%{$search_query}%")
                            // ->orWhere('text_html', 'like', "%{$validated['search_query']}%") // поиск по тексту
                            ->paginate(8)
                            ->onEachSide(1)
                            ->withQueryString();
                            // ->get();

        foreach($products as $product) {
            $product->excerpt = (new \App\Services\Excerpt($product->description->text_html, 65))->create();
        }

        return view('poisk', compact('products', 'search_query'));
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
     * Отзывы
     * 
     * @param
     * @return Illuminate\View\View
     */
    public function testimonials(): View
    {
        $testimonials = \App\Models\Testimonial::whereNotNull('product_id')
                                                ->whereNotNull('publicated_at')
                                                ->orderBy('created_at', 'DESC')
                                                ->paginate(10);

        return view('testimonials', compact('testimonials'));
    }

    /**
     * Бронирование
     * 
     * @param
     * @return Illuminate\View\View
     */
    public function booking(): View
    {
        return view('booking');
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
