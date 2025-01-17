<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Product extends Model
{
    /** @use HasFactory<\Database\Factories\ProductFactory> */
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */    
    protected $fillable = [
        'category_id',
        'title',
        'slug',
        'image',
        'start_date',
        'price',
    ];

    /**
     * Получить категорию товара.
     * Один к одному обратное соотношение
     */
    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }

    /**
     * Получить описание товара.
     * Один к одному
     */
    public function description(): HasOne
    {
        return $this->hasOne(ProductDescription::class);
    }

    /**
     * Получить галерею товара.
     * Один ко многим
     */
    public function gallery(): hasMany
    {
        return $this->hasMany(ProductGallery::class);
    }

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'start_date' => 'datetime'
        ];
    }
    
    /**
     * Поиск модели по slug
     */
    public function getRouteKeyName()
    {
        return 'slug';
    }
}
