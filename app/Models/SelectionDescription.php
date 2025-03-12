<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SelectionDescription extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'selections_descriptions';

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */    
    protected $fillable = [
        'selection_id',
        'text_json',
        'text_html',
    ];
}
