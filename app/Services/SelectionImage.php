<?php

namespace App\Services;

use Illuminate\Support\Facades\Storage;

class SelectionImage
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
        return Storage::disk('public')->putFile('/uploads/selections', $this->validated["input-main-file"]);
    }
    
    /**
     * Обновление изображения для товара
     * 
     * @param Illuminate\Database\Eloquent\Model Product
     * @return mixed
     */
    public function update($selection): mixed
    {
        if (Storage::disk('public')->exists($selection->image)) {
            Storage::disk('public')->delete($selection->image);
        }

        return Storage::disk('public')->putFile('/uploads/selections', $this->validated["input-main-file"]);
    }
}