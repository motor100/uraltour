<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

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
     * Получить категорю товара.
     * Один к одному обратное соотношение
     */
    public function category()
    {
        return $this->belongsTo(Category::class);
    }
    
    /**
     * Поиск модели по slug
     */
    public function getRouteKeyName()
    {
        return 'slug';
    }
}
