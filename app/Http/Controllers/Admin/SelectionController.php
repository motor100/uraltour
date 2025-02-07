<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Selection;
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

        return view('dashboard.selections-edit', compact('selection'));
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
            'description' => 'required|min:2|max:1000',
            'input-main-file' => [
                                'nullable',
                                \Illuminate\Validation\Rules\File::types(['jpg', 'png'])
                                                                    ->min(10)
                                                                    ->max(3000)
                                ],
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

        // Обновление описания
        $selection->title = $validated['title'];
        $selection->slug = $slug;
        $selection->image = $image;
        $selection->excerpt = $validated['excerpt'];
        $selection->description = $validated['description'];

        $selection->save();

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
