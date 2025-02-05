<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Recommendation;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class RecommendationController extends Controller
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
            $recommendations = Recommendation::where('title', 'like', "%{$search_query}%");
                               
        } else {
            $recommendations = Recommendation::orderBy('id', 'desc');                               
        }

        $recommendations = $recommendations->get();

        return view('dashboard.recommendations', compact('recommendations'));
    }

    /**
     * Show the form for creating a new resource.
     * 
     * @return \Illuminate\View\View
     */
    public function create(): View
    {
        return view('dashboard.recommendations-create');
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

        Recommendation::create($description_array);

        return redirect()->route('dashboard.recommendations');
    }

    /**
     * Display the specified resource.
     * 
     * @param string $id
     * @return \Illuminate\View\View
     */
    public function show(string $id): View
    {
        $recommendation = Recommendation::findOrFail($id);

        return view('dashboard.recommendations-show', compact('recommendation'));
    }

    /**
     * Show the form for editing the specified resource.
     * 
     * @param string $id
     * @return \Illuminate\View\View
     */
    public function edit(string $id): View
    {
        $recommendation = Recommendation::findOrFail($id);

        // Передача данных в редактор Editor JS
        $to_editorjs = $recommendation->text_json;

        return view('dashboard.recommendations-edit', compact('recommendation', 'to_editorjs'));
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

        Recommendation::where('id', $id)->update($description_array);

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
        $recommendation = Recommendation::findOrFail($id);

        // Удаление модели Recommendation
        $recommendation->delete();

        return redirect()->back();
    }
}
