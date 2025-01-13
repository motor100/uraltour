<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Testimonial extends Model
{
    /** @use HasFactory<\Database\Factories\ProductFactory> */
    use HasFactory;
    
    protected $fillable = [
        'product_id',
        'name',
        'text',
        'rating',
    ];

    /**
     * Получить галерею для этого отзыва
     */
    public function gallery(): HasMany
    {
        return $this->hasMany(TestimonialGallery::class);
    }
}
