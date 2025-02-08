<?php

namespace App\Services;

class ProductRating
{
    protected $testimonial;

    /**
     * @param App\Models\Testimonial
     */
    public function __construct($testimonial)
    {
        $this->testimonial = $testimonial;
    }

    /**
     * Обновление рейтинга для товара
     * 
     * @return void
     */
    public function set(): void
    {
        if ($this->testimonial->product) {

            // Получаю все опубликованные отзывы для этого товара
            $testimonials = \App\Models\Testimonial::where('product_id', $this->testimonial->product->id)
                                                    ->whereNotNull('publicated_at')
                                                    ->get();

            $count = count($testimonials);

            $rating = 0;

            foreach($testimonials as $testimonial) {
                $rating += $testimonial->rating;
            }

            // Округление, тип float
            $rating = round($rating / $count);

            // Преобразование к типу integer
            $rating = intval($rating);

            // Обновление рейтинга модель Product
            $this->testimonial->product->rating = $rating;

            $this->testimonial->product->save();
        }

        return;
    }
}