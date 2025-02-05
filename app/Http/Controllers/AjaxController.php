<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
// use Illuminate\View\View;
// use Illuminate\Http\RedirectResponse;
use Illuminate\Http\JsonResponse;
// use App\Models\Category;
use App\Models\Product;


class AjaxController extends Controller
{
    /**
     * Ajax product search Поиск товаров
     * 
     * @param Illuminate\Http\Request
     * @return Illuminate\Http\JsonResponse
     */
    public function product_search(Request $request): JsonResponse
    {
        $search_query = $request->input('search_query');

        if (!$search_query) {
            return response()->json([]);
        }

        $search_query = htmlspecialchars($search_query);

        $products = Product::where('title', 'like', "%{$search_query}%") // поиск по названию товара
                            // ->orWhere('text_html', 'like', "%{$search_query}%") // поиск по тексту
                            ->with('category')
                            ->get();

        foreach($products as $product) {
            $product->storage_image = \Illuminate\Support\Facades\Storage::url($product->image);
            $product->date = $product->start_date->format("d.m.Y");
        }

        return response()->json($products);
    }

    public function add_testimonial(Request $request): JsonResponse
    {
        $validator = \Illuminate\Support\Facades\Validator::make($request->all(), [
            'name' => 'required|min:3|max:50',
            'text' => 'required|min:3|max:1000',
            'rating' => 'required|min:0|max:5',
            'recaptcha' => 'required',
            'product-id' => 'required',
            'input-gallery-file' => 'nullable|max:3',
            'input-gallery-file.*' => [
                \Illuminate\Validation\Rules\File::types(['jpg', 'png'])
                                                    ->min(10)
                                                    ->max(3000)
            ],
        ]);
        
        if ($validator->fails()) {
            return response()->json(['error' => 'valiadator fails']);
        }

        $validated = $validator->validated();
        
        // Google Captcha
        $g_response = (new \App\Services\GoogleCaptcha($validated))->get();

        if (!$g_response) {
            return response()->json(['error' => 'google captcha error']);
        }
        
        $testimonial = \App\Models\Testimonial::create([
            'product_id' => $validated["product-id"] ? $validated["product-id"] : NULL,
            'name' => $validated["name"],
            'text' => $validated["text"],
            'rating' => $validated["rating"],
            'publicated_at' => NULL
        ]);

        if (array_key_exists("input-gallery-file", $validated)) {
            $gallery = $validated["input-gallery-file"];

            $insert_array = [];

            foreach($gallery as $file) {
                $tmp["testimonial_id"] = $testimonial->id;
                $tmp["image"] = (new \App\Services\TestimonialImage($file))->create();
                $tmp["created_at"] = now();
                $tmp["updated_at"] = now();
                $insert_array[] = $tmp;
            }

            \App\Models\TestimonialGallery::insert($insert_array);
        }

        return response()->json(['success' => 'thank you']);
    }
}
