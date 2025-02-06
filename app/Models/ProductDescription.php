<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class ProductDescription extends Model
{
    /** @use HasFactory<\Database\Factories\ProductDescriptionFactory> */
    use HasFactory;
    
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'products_descriptions';

    /**
     * Получить рекомендацию товара.
     * Один ко многим обратное
     */
    public function recommendation(): BelongsTo
    {
        return $this->belongsTo(Recommendation::class, 'recommendation_id');
    }

    /**
     * Получить оплату товара.
     * Один ко многим обратное
     */
    public function payment(): BelongsTo
    {
        return $this->belongsTo(Payment::class, 'payment_id');
    }
    
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */    
    protected $fillable = [
        'product_id',
        'text_json',
        'text_html',
        'recommendation_id',
        'payment_id',
    ];
}
