<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Category extends Model
{
    protected $fillable = [
        'title',
        'slug',
        'image',
        'sort',
    ];

    /**
     * Получить товары для категории.
     * Многие ко многим
     */
    public function products(): BelongsToMany
    {
        return $this->belongsToMany(Product::class, 'products_categories');
    }

    /**
     * Поиск модели по slug
     */
    public function getRouteKeyName()
    {
        return 'slug';
    }
}
