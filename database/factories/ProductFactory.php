<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Product>
 */
class ProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $rand_number = random_int(2, 8);    
        $title = $this->faker->sentence($rand_number);
        $price = random_int(100, 10000);
        
        return [
            'category_id' => random_int(1, 10),
            'title' => $title,
            'slug' => Str::slug($title),
            'image' => 'public/uploads/products/product' . $rand_number . '.jpg',
            'start_date' => $this->faker->dateTime(),
            'price' => $price,
            'created_at' => $this->faker->dateTime(),
            'updated_at' => $this->faker->dateTime()
        ];
    }

}
