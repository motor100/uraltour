<?php

namespace App\Services;

use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class ProductFilter {

    private $belonstomany;
    private $request;

    public function __construct(BelongsToMany $belonstomany, Request $request) {
        $this->belonstomany = $belonstomany;
        $this->request = $request;
    }

    public function apply()
    {
        $query_params = $this->request->query();

        // Получаю все slug из таблицы attributes
        $slugs = \App\Models\Attribute::select('slug')->get();

        // Формирую массив с параметрами из запроса которые есть в таблице attributes столбец slug
        $filtered_query_params = [];

        foreach($slugs as $slug) {
            if(isset($query_params[$slug->slug])) {
                $filtered_query_params[$slug->slug] = $query_params[$slug->slug];
            }
        }

        foreach ($filtered_query_params as $value) {
            $this->belonstomany->whereHas('products_attributes', function ($query) use ($value) {
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

        return $this->belonstomany;
    }
}