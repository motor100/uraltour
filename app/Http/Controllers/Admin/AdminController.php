<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;

class AdminController extends Controller
{
    // Главная страница с уведомлениями
    public function home()
    {
        return view('dashboard.home');
    }

    /**
     * Удаление товара из подборки
     * 
     * @param \Illuminate\Http\Request $request
     * @param string $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function selection_product_destroy(Request $request, string $id): RedirectResponse
    {
        $validated = $request->validate([
            'selection_id' => 'required',
        ]);

        \App\Models\ProductSelection::where('product_id', $id)
                                    ->where('selection_id', $validated['selection_id'])
                                    ->delete();
        
        return redirect()->back();
    }

    /**
     * Удаление категории из товара
     * 
     * @param \Illuminate\Http\Request $request
     * @param string $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function product_category_destroy(Request $request, string $id): RedirectResponse
    {
        $validated = $request->validate([
            'product_id' => 'required',
        ]);

        \App\Models\ProductCategory::where('category_id', $id)
                                    ->where('product_id', $validated['product_id'])
                                    ->delete();
        
        return redirect()->back();
    }

}
