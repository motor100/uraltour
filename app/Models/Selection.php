<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Selection extends Model
{
    protected $fillable = [
        'title',
        'slug',
        'image',
        'excerpt',
        'description',
    ];

    /**
     * Получить товары для этой подборки
     * Многие ко многим
     * Через промежуточную таблицу product_relation
     */
    public function products(): BelongsToMany
    {
        return $this->belongsToMany(Product::class);
    }

    /**
     * Получить описание подборки.
     * Один к одному
     */
    public function description(): HasOne
    {
        return $this->hasOne(SelectionDescription::class);
    }

    /**
     * Поиск модели по slug
     */
    public function getRouteKeyName()
    {
        return 'slug';
    }
}
