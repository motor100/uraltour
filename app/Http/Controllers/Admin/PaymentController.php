<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Payment;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class PaymentController extends Controller
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
            $payments = Payment::where('title', 'like', "%{$search_query}%");
                               
        } else {
            $payments = Payment::orderBy('id', 'desc');                               
        }

        $payments = $payments->get();

        return view('dashboard.payments', compact('payments'));
    }

    /**
     * Show the form for creating a new resource.
     * 
     * @return \Illuminate\View\View
     */
    public function create(): View
    {
        return view('dashboard.payments-create');
    }

    /**
     * Store a newly created resource in storage.
     * 
     * @param \Illuminate\Http\Request $request
     * @return Illuminate\Http\RedirectResponse
     */
    public function store(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'title' => 'required|min:2|max:250',
            'text_json' => 'required|min:2|max:65535',
        ]);

        $html = (new \App\Services\JsonToHtml($validated['text_json']))->render();

        // Описание
        $description_array = [
            'title' => $validated['title'],
            'text_json' => $validated['text_json'],
            'text_html' => $html,
        ];

        Payment::create($description_array);

        return redirect()->route('dashboard.payments');
    }

    /**
     * Display the specified resource.
     * 
     * @param string $id
     * @return \Illuminate\View\View
     */
    public function show(string $id): View
    {
        $payment = Payment::findOrFail($id);

        return view('dashboard.payments-show', compact('payment'));
    }

    /**
     * Show the form for editing the specified resource.
     * 
     * @param string $id
     * @return \Illuminate\View\View
     */
    public function edit(string $id): View
    {
        $payment = Payment::findOrFail($id);

        // Передача данных в редактор Editor JS
        $to_editorjs = $payment->text_json;

        return view('dashboard.payments-edit', compact('payment', 'to_editorjs'));
    }

    /**
     * Update the specified resource in storage.
     * 
     * @param \Illuminate\Http\Request $request
     * @param string $id
     * @return Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, string $id): RedirectResponse
    {
        $validated = $request->validate([
            'title' => 'required|min:2|max:250',
            'text_json' => 'required|min:2|max:65535',
        ]);

        $html = (new \App\Services\JsonToHtml($validated['text_json']))->render();

        // Обновление описания
        $description_array = [
            'title' => $validated['title'],
            'text_json' => $validated['text_json'],
            'text_html' => $html,
        ];

        Payment::where('id', $id)->update($description_array);

        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     * 
     * @param string $id
     * @return Illuminate\Http\RedirectResponse
     */
    public function destroy(string $id): RedirectResponse
    {
        $payment = Payment::findOrFail($id);

        // Удаление модели Payment
        $payment->delete();

        return redirect()->back();
    }
}
