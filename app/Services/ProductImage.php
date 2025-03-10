<?php

namespace App\Services;

use Illuminate\Support\Facades\Storage;
use Intervention\Image\ImageManager;
use Intervention\Image\Drivers\Gd\Driver;

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
        $filename = Storage::disk('public')->putFile('/uploads/products', $this->validated["input-main-file"]);

        $this->cover($filename);
        
        return $filename;
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

        $filename = Storage::disk('public')->putFile('/uploads/products', $this->validated["input-main-file"]);

        $this->cover($filename);

        return $filename;
    }

    /**
     * Изменение размера изображения
     * 
     * @param string $filename
     * @return void
     */
    public function cover($filename): void
    {
        // Create image manager with desired driver
        $manager = new ImageManager(new Driver());

        // Path to file
        $path = Storage::disk('public')->path($filename);

        // Read image from file system
        $image = $manager->read($path);

        // Cover image proportionally to 520px width and 520px height
        $image->cover(width: 520, height: 520);

        // Save modified image in new format 
        $image->toJpeg()->save($path);

        return;
    }
}