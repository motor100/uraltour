<?php

namespace App\Services;

use Illuminate\Support\Facades\Storage;
use Intervention\Image\ImageManager;
use Intervention\Image\Drivers\Gd\Driver;
// use Intervention\Image\Drivers\Imagick\Driver;

class TestimonialImage
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
     * Создание изображения для отзыва
     * 
     * @return mixed
     */
    public function create(): mixed
    {
        $filename = Storage::disk('public')->putFile('/uploads/testimonials', $this->file);

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

        // Cover image proportionally to 200px width and 200px height
        $image->cover(width: 200, height: 200);

        // Save modified image in new format 
        $image->toJpeg()->save($path);

        return;
    }
}