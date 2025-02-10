<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
// use App\Models\Event;
// use App\Models\Client;
// use Illuminate\Http\Request;
// use Illuminate\Support\Facades\DB;
// use Illuminate\View\View;
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

}
