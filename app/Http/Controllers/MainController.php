<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\View\View;
use Illuminate\Http\Response;
use Illuminate\Http\RedirectResponse;
use App\Models\Category;
use App\Models\Product;
use App\Models\Selection;

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
        // Подборки
        $selections = \App\Models\Selection::all();
        
        // Категории
        $categories = \App\Models\Category::all();
        
        // Отзывы
        $testimonials = \App\Models\Testimonial::whereNotNull('product_id')
                                                ->whereNotNull('publicated_at')
                                                ->orderBy('created_at', 'DESC')
                                                ->limit(6)
                                                ->get();

        // Удаление галереи из отзывов
        foreach($testimonials as $testimonial) {
            $testimonial->gallery = [];
        }
        
        return view('home', compact('selections', 'categories', 'testimonials'));
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
     * @param \Illuminate\Http\Request $request;
     * @param App\Models\Category
     * @return Illuminate\View\View
     */
    public function category(Request $request, Category $category): View
    {
        if ($category) {

            // Товары из этой категории
            // Метод products(), а не свойство products
            // Метод products() возвращает Illuminate\Database\Eloquent\BelongsToMany
            // Свойство products возвращает коллекцию Illuminate\Database\Eloquent\Collection
            $products1 = $category->products();

            // Сортировка по цене по параметру sort Illuminate\Database\Eloquent\BelongsToMany
            $products = (new \App\Services\ProductSort($request))->sort_belonstomany($products1);

            // Пагинация с параметрами
            $products = $products->paginate(12)->withQueryString()->onEachSide(1);

            // Добавление краткого описания и текущей категории
            foreach($products as $product) {
                $product->excerpt = (new \App\Services\Excerpt($product->description->text_html, 65))->create();
                $product->categories[0] = $category;
            }

            // Регулярные туры
            $regular_products = $products1->where('regular', '1')->get();

            // Добавление краткого описания и текущей категории
            foreach($regular_products as $product) {
                $product->excerpt = (new \App\Services\Excerpt($product->description->text_html, 65))->create();
                $product->categories[0] = $category;
            }

            return view('category', compact('category', 'products', 'regular_products'));
        }

        return abort(404);
    }

    /**
     * Подборки
     * 
     * @return \Illuminate\Http\RedirectResponse
     */
    public function selections(): RedirectResponse
    {
        return redirect()->route('home');
    }

    /**
     * Подборка
     * 
     * @param \Illuminate\Http\Request $request;
     * @param App\Models\Selection
     * @return Illuminate\View\View
     */
    public function selection(Request $request, Selection $selection): View
    {
        if ($selection) {
        
            // Добавление краткого описания
            foreach($selection->products as $product) {
                $product->excerpt = (new \App\Services\Excerpt($product->description->text_html, 65))->create();
            }

            // Сортировка по цене по параметру sort Illuminate\Database\Eloquent\Collection
            $selection->products = (new \App\Services\ProductSort($request))->sort_collection($selection->products);

            return view('selection', compact('selection'));
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
    public function product(Category $category, Product $product): mixed
    {
        // Если есть модели Category и Product
        if ($category && $product) {

            // Если товар из этой категории
            $product_category = \App\Models\ProductCategory::where('product_id', $product->id)
                                                            ->where('category_id', $category->id)
                                                            ->first();
            if ($product_category) {
                // Отзывы
                $testimonials = \App\Models\Testimonial::where('product_id', $product->id)
                                                        ->whereNotNull('publicated_at')
                                                        ->orderBy('created_at', 'DESC')
                                                        ->paginate(10);

                return view('product', compact('category', 'product', 'testimonials'));
            }

            return abort(404);
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

        // Метод Product::where() возвращает Illuminate\Database\Eloquent\Builder
        $products = Product::where('title', 'like', "%{$search_query}%");
                            // ->orWhere('text_html', 'like', "%{$validated['search_query']}%") // поиск по тексту

        // Сортировка по цене по параметру sort Illuminate\Database\Eloquent\Builder
        $products = (new \App\Services\ProductSort($request))->sort_builder($products);

        // Пагинация с параметрами
        $products = $products->paginate(8)->withQueryString()->onEachSide(1);

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

    /**
     * Условия возврата денежных средств
     * 
     * @param
     * @return Illuminate\View\View
     */
    public function money_back(): View
    {
        return view('money-back');
    }

    /**
     * Sitemap карта сайта
     * 
     * return Illuminate\Http\Response
     */
    public function sitemap(): Response
    {
        $products = Product::whereNull('deleted_at')
                            ->with('category')
                            ->get();

        return response()
                ->view('sitemap', compact('products'))
                ->header('Content-Type', 'text/xml');
    }
}