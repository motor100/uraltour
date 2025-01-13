<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Product>
 */
class ProductGalleryFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $rand_number = random_int(1, 50);
        $datetime = $this->faker->dateTime();
        
        return [
            'product_id' => $rand_number,
            'image' => 'public/uploads/products-galleries/product' . random_int(1, 10) . '.jpg',
            'created_at' => $datetime,
            'updated_at' => $datetime
        ];
    }

}
