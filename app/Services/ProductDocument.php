<?php

namespace App\Services;

use Illuminate\Support\Facades\Storage;

class ProductDocument
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
     * Создание документа для товара
     * 
     * @return mixed
     */
    public function create(): mixed
    {
        return Storage::disk('public')->putFile('/uploads/documents', $this->validated["input-main-file"]);
    }
    
    /**
     * Обновление документа для товара
     * 
     * @param Illuminate\Database\Eloquent\Model Document
     * @return mixed
     */
    public function update($document): mixed
    {
        if (Storage::disk('public')->exists($document->file)) {
            Storage::disk('public')->delete($document->file);
        }

        return Storage::disk('public')->putFile('/uploads/documents', $this->validated["input-main-file"]);
    }
}