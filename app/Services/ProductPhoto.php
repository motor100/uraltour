<?php

namespace App\Services;

use Illuminate\Support\Facades\Storage;

class ProductPhoto
{
    protected $file;

    /**
     * @param Illuminate\Http\File
     */
    public function __construct($file)
    {
        $this->file = $file;
    }

    /**
     * Создание фото для товара
     * 
     * @return mixed
     */
    public function create(): mixed
    {
        return Storage::disk('public')->putFile('/uploads/products-photos', $this->file);
    }
}