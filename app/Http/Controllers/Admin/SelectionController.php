<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Selection;
use App\Models\ProductSelection;
use App\Models\SelectionDescription;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

class SelectionController extends Controller
{
    /**
     * Display a listing of the resource.
     * 
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\View\View
     */
    public function index(): View
    {
        $selections = Selection::all();                               

        return view('dashboard.selections', compact('selections'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store()
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show()
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     * 
     * @param string $id
     * @return \Illuminate\View\View
     */
    public function edit(string $id): View
    {
        $selection = Selection::findOrFail($id);

        // Передача данных в редактор Editor JS
        $to_editorjs = $selection->description->text_json;

        return view('dashboard.selections-edit', compact('selection', 'to_editorjs'));
    }

    /**
     * Update the specified resource in storage.
     * 
     * @param \Illuminate\Http\Request $request
     * @param string $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, string $id): RedirectResponse
    {
        $validated = $request->validate([
            'title' => 'required|min:2|max:100',
            'excerpt' => 'required|min:2|max:100',
            'text_json' => 'required|min:2|max:65535',
            'input-main-file' => [
                                'nullable',
                                \Illuminate\Validation\Rules\File::types(['jpg', 'png'])
                                                                    ->min(10)
                                                                    ->max(3000)
                                ],
            'products' => 'nullable'
        ]);

        $selection = Selection::findOrFail($id);

        $slug = Str::slug($validated['title']);

        if ($slug != $selection->slug) {
            // Проверка на уникальный slug
            $slug = (new \App\Services\Slug(Selection::query(), $slug))->check();            
        }

        if (isset($validated['input-main-file'])) {
            if (Storage::disk('public')->exists($selection->image)) {
                Storage::disk('public')->delete($selection->image);
            }
            $image = (new \App\Services\SelectionImage($validated))->update($selection);
        } else {
            $image = $selection->image;
        }

        $html = (new \App\Services\JsonToHtml($validated['text_json']))->render();

        // Обновление описания
        $description_array = [
            'selection_id' => $selection->id,
            'text_json' => $validated['text_json'],
            'text_html' => $html,
        ];

        SelectionDescription::where('selection_id', $selection->id)->update($description_array);

        // Обновление модели
        $selection->title = $validated['title'];
        $selection->slug = $slug;
        $selection->image = $image;
        $selection->excerpt = $validated['excerpt'];

        $selection->save();

        // Удаляю все товары из этой подборки
        ProductSelection::where('selection_id', $id)->delete();

        // Вставляю новые товары
        if (isset($validated['products'])) {
            $insert_array = [];

            foreach ($validated['products'] as $key => $value) {
                $tmp['product_id'] = intval($key);
                $tmp['selection_id'] = intval($id);
                $insert_array[] = $tmp;
            }

            ProductSelection::insert($insert_array);
        }

        return redirect()->back();
    }

    /**
     * Restore the specified resource.
     */
    public function destroy(string $id)
    {
        //
    }
}
