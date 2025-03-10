<?php

namespace App\Services;

use Illuminate\Support\Facades\Storage;
use Intervention\Image\ImageManager;
use Intervention\Image\Drivers\Gd\Driver;

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
        $filename = Storage::disk('public')->putFile('/uploads/products-photos', $this->file);

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

        // Cover image proportionally to 420px width and 420px height
        $image->cover(width: 420, height: 420);

        // Save modified image in new format 
        $image->toJpeg()->save($path);

        return;
    }
}