<?php

namespace App\Services;

use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Builder;

class ProductSort
{
    protected $request;

    /**
     * @param Illuminate\Http\Request
     */
    public function __construct(Request $request)
    {
        $this->request = $request;
    }
    
    /**
     * Сортировка по цене по параметру sort
     * Принимает параметр и возвращает BelongsToMany
     * 
     * @param Illuminate\Database\Eloquent\BelongsToMany
     * @return Illuminate\Database\Eloquent\BelongsToMany
     */
    public function sort_belonstomany(BelongsToMany $belonstomany)
    {
        if ($this->request->has('sort')) {
            if ($this->request->sort == "desc" || $this->request->sort == "asc") {
                $belonstomany = $belonstomany->orderBy('price', $this->request->sort);
            } else {
                $belonstomany = $belonstomany->orderBy('title', 'asc');
            }
        } else {
            $belonstomany = $belonstomany->orderBy('title', 'asc');
        }

        return $belonstomany;
    }

    /**
     * Сортировка по цене по параметру sort
     * Принимает параметр и возвращает Builder
     * 
     * @param Illuminate\Database\Eloquent\Builder
     * @return Illuminate\Database\Eloquent\Builder
     */
    public function sort_builder(Builder $builder)
    {
        if ($this->request->has('sort')) {
            if ($this->request->sort == "desc" || $this->request->sort == "asc") {
                $builder = $builder->orderBy('price', $this->request->sort);
            } else {
                $builder = $builder->orderBy('title', 'asc');
            }
        } else {
            $builder = $builder->orderBy('title', 'asc');
        }

        return $builder;
    }

    /**
     * Сортировка по цене по параметру sort
     * Принимает параметр и возвращает Collection
     * 
     * @param Illuminate\Database\Eloquent\Collection
     * @return Illuminate\Database\Eloquent\Collection
     */
    public function sort_collection(Collection $collection)
    {
        if ($this->request->has('sort')) {
            if ($this->request->sort == "desc") {
                $collection = $collection->sortByDesc('price');
            } elseif ($this->request->sort == "asc") {
                $collection = $collection->sortBy('price');
            } else {
                $collection = $collection->sortBy('title');
            }
        } else {
            $collection = $collection->sortBy('title');
        }

        return $collection;
    }
}