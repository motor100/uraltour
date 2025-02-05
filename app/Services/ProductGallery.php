<?php

namespace App\Services;

use Illuminate\Support\Facades\Storage;

class ProductGallery
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
     * Создание галереи для товара
     * 
     * @return mixed
     */
    public function create(): mixed
    {
        return Storage::disk('public')->putFile('/uploads/products-galleries', $this->file);
    }
}