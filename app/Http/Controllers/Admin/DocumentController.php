<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Document;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;
use Illuminate\Support\Facades\Storage;

class DocumentController extends Controller
{
    /*
    public function index()
    {
        \App\Models\Category::truncate();

        $categories_array = [
            [
                'title' => 'Событийные туры',
                'slug' => 'sobytijnye-tury',
                'image' => 'public/uploads/categories/category1.jpg',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'title' => 'Урал',
                'slug' => 'ural',
                'image' => 'public/uploads/categories/category2.jpg',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'title' => 'Туры по России',
                'slug' => 'tury-po-rossii',
                'image' => 'public/uploads/categories/category3.jpg',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'title' => 'Ближнее зарубежье',
                'slug' => 'blizhnee-zarubezhe',
                'image' => 'public/uploads/categories/category1.jpg',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'title' => 'Экскурсии',
                'slug' => 'ehkskursii',
                'image' => 'public/uploads/categories/category2.jpg',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'title' => 'Активный отдых, сплавы',
                'slug' => 'aktivnyj-otdyh-splavy',
                'image' => 'public/uploads/categories/category3.jpg',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'title' => 'Термы, spa',
                'slug' => 'termy-spa',
                'image' => 'public/uploads/categories/category1.jpg',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'title' => 'Театры, концерты',
                'slug' => 'teatry-koncerty',
                'image' => 'public/uploads/categories/category2.jpg',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'title' => 'Национальные маршруты',
                'slug' => 'nacionalnye-marshruty',
                'image' => 'public/uploads/categories/category3.jpg',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'title' => 'Пляжный отдых',
                'slug' => 'plyazhnyj-otdyh',
                'image' => 'public/uploads/categories/category1.jpg',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'title' => 'Джип-туры',
                'slug' => 'dzhip-tury',
                'image' => 'public/uploads/categories/category2.jpg',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'title' => 'Для школьников',
                'slug' => 'dlya-shkolnikov',
                'image' => 'public/uploads/categories/category3.jpg',
                'created_at' => now(),
                'updated_at' => now()
            ],
        ];

        return \App\Models\Category::insert($categories_array);
    }
    */    
    
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
            $documents = Document::where('title', 'like', "%{$search_query}%");
                               
        } else {
            $documents = Document::orderBy('id', 'desc');                               
        }

        $documents = $documents->get();

        return view('dashboard.documents', compact('documents'));
    }

    /**
     * Show the form for creating a new resource.
     * 
     * @return \Illuminate\View\View
     */
    public function create(): View
    {
        return view('dashboard.documents-create');
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
            'input-main-file' => [
                                'required',
                                \Illuminate\Validation\Rules\File::types(['application/pdf'])
                                                                    ->min(1)
                                                                    ->max(3000)
                                ],
        ]);

        $document_array = [
            'title' => $validated['title'],
            'file' => (new \App\Services\ProductDocument($validated))->create(),
        ];

        Document::create($document_array);

        return redirect()->route('dashboard.documents');
    }

    /**
     * Display the specified resource.
     * 
     * @param string $id
     * @return \Illuminate\View\View
     */
    public function show(string $id): View
    {
        $document = Document::findOrFail($id);

        return view('dashboard.documents-show', compact('document'));
    }

    /**
     * Show the form for editing the specified resource.
     * 
     * @param string $id
     * @return \Illuminate\View\View
     */
    public function edit(string $id): View
    {
        $document = Document::findOrFail($id);

        return view('dashboard.documents-edit', compact('document'));
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
            'input-main-file' => [
                                'nullable',
                                \Illuminate\Validation\Rules\File::types(['application/pdf'])
                                                                    ->min(1)
                                                                    ->max(3000)
                                ],
        ]);

        $document = Document::findOrFail($id);

        // Удаление старого документа
        if (isset($validated['input-main-file'])) {
            if (Storage::disk('public')->exists($document->file)) {
                Storage::disk('public')->delete($document->file);
            }
            $document = (new \App\Services\ProductDocument($validated))->update($document);
        } else {
            $document = $document->file;
        }

        // Обновление документа
        $document_array = [
            'title' => $validated['title'],
            'file' => $document,
        ];

        Document::where('id', $id)->update($document_array);

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
        $document = Document::findOrFail($id);

        // Удаление модели Document
        $document->delete();

        return redirect()->back();
    }
}
