<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProductProgram extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'products_programs';
    
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */    
    protected $fillable = [
        'product_id',
        'text_json',
        'text_html',
    ];
}
