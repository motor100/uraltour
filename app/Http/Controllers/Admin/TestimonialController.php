<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;
use App\Models\Testimonial;
use Illuminate\Support\Facades\Storage;

class TestimonialController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        $testimonials = Testimonial::whereNull('publicated_at')
                                    ->orderBy('created_at', 'desc')
                                    ->get();

        return view('dashboard.testimonials', compact('testimonials'));
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
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     * 
     * @param int $id
     * @return \Illuminate\View\View
     */
    public function update(Request $request, string $id): RedirectResponse
    {
        $validated = $request->validate([
            'name' => 'required|min:3|max:150',
            'text' => 'required|min:3|max:1000',
        ]);

        $testimonial = Testimonial::findOrFail($id);

        $testimonial->update([
            'name' => $validated["name"],
            'text' => $validated["text"],
            'publicated_at' => now(),
        ]);

        return redirect()->route('dashboard.testimonials');
    }

    /**
     * Remove the specified resource from storage.
     * 
     * @param int $id
     * @return Illuminate\Http\RedirectResponse
     */
    public function destroy(string $id): RedirectResponse
    {
        $testimonial = Testimonial::findOrFail($id);

        // Удаление галереи
        if (count($testimonial->gallery) > 0) {
            foreach($testimonial->gallery as $item) {

                // Удаление файла галереи
                if (Storage::disk('public')->exists($item->image)) {
                    Storage::disk('public')->delete($item->image);
                }

                // Удаление модели галереи
                $item->delete();
            }
        }

        // Удаление модели отзыва
        $testimonial->delete();

        return redirect()->back();
    }
}
