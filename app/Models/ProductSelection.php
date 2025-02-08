<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProductSelection extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'product_selection';

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */    
    protected $fillable = [
        'product_id',
        'selection_id',
    ];
    
    public $timestamps = false;
}
