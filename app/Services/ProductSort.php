<?php

namespace App\Services;

use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Builder;

class ProductSort
{
    protected $request;
    protected $builder;

    /**
     * @param Illuminate\Http\Request
     * @param Illuminate\Database\Eloquent\Builder
     */
    public function __construct(Request $request, Builder $builder)
    {
        $this->request = $request;
        $this->builder = $builder;
    }
    
    /**
     * Сортировка по цене по параметру sort
     * 
     * @return Illuminate\Database\Eloquent\Builder
     */
    public function sort()
    {
        if ($this->request->has('sort')) {
            if ($this->request->sort == "desc" || $this->request->sort == "asc") {
                $this->builder = $this->builder->orderBy('price', $this->request->sort);
            } else {
                $this->builder = $this->builder->orderBy('title', 'asc');
            }
        } else {
            $this->builder = $this->builder->orderBy('title', 'asc');
        }

        return $this->builder;
    }
}