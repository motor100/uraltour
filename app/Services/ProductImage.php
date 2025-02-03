<?php

namespace App\Services;

use Illuminate\Support\Facades\Storage;

class ProductImage
{
    protected $validated;

    /**
     * @param array $request->validated()
     */
    public function __construct($validated)
    {
        $this->validated = $validated;
    }

    /**
     * Создание изображения для товара
     * 
     * @return mixed
     */
    public function create(): mixed
    {
        return Storage::disk('public')->putFile('/uploads/products', $this->validated["input-main-file"]);
    }
    
    /**
     * Обновление изображения для товара
     * 
     * @param Illuminate\Database\Eloquent\Model Product
     * @return mixed
     */
    public function update($product): mixed
    {
        if (Storage::disk('public')->exists($product->image)) {
            Storage::disk('public')->delete($product->image);
        }

        return Storage::disk('public')->putFile('/uploads/products', $this->validated["input-main-file"]);
    }
}