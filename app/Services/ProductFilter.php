<?php

namespace App\Services;

use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Builder;

class ProductFilter {

    private $builder;
    private $request;

    public function __construct(Builder $builder, Request $request) {
        $this->builder = $builder;
        $this->request = $request;
    }

    public function apply() {
        
        foreach ($this->request->query() as $value) {
            $this->builder->whereHas('products_attributes', function ($query) use ($value) {
                foreach($value as $ke => $item) {
                    if($ke == 0) {
                        $query->where('slug', $item);
                    } else {
                        $query->orWhere('slug', $item);
                    }
                }
                return $query;
            });
        }
        return $this->builder;
    }

    /*
    private function vid($value) {
        $this->builder->whereHas('property_enums', function ($query) use ($value) {
            foreach($value as $key => $item) {
                if($key == 0) {
                    $query->where('slug', $item);
                } else {
                    $query->orWhere('slug', $item);
                }
            }
            return $query;
        });
    }

    private function gorod($value) {
        $this->builder->whereHas('property_enums', function ($query) use ($value) {
            foreach($value as $key => $item) {
                if($key == 0) {
                    $query->where('slug', $item);
                } else {
                    $query->orWhere('slug', $item);
                }
            }
            return $query;
        });
    }

    private function slozhnost($value) {
        $this->builder->whereHas('property_enums', function ($query) use ($value) {
            foreach($value as $key => $item) {
                if($key == 0) {
                    $query->where('slug', $item);
                } else {
                    $query->orWhere('slug', $item);
                }
            }
            return $query;
        });
    }
    */



}