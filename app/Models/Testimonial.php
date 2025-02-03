<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Testimonial extends Model
{
    /** @use HasFactory<\Database\Factories\ProductFactory> */
    use HasFactory;
    
    protected $fillable = [
        'product_id',
        'name',
        'text',
        'rating',
        'publicated_at',
    ];

    /**
     * Получить галерею для этого отзыва
     */
    public function gallery(): HasMany
    {
        return $this->hasMany(TestimonialGallery::class);
    }

    /**
     * Получить товар, которому принадлежит отзыв
     */
    public function product(): BelongsTo
    {
        return $this->belongsTo(Product::class);
    }
}
