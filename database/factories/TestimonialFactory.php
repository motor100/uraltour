<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Testimonial>
 */
class TestimonialFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $rand_number = random_int(2, 8);
        $this->faker = \Faker\Factory::create('ru_RU');
        
        return [
            'product_id' => $rand_number == 2 ? random_int(1, 100) : NULL,
            'name' => $rand_number == 3 ? $this->faker->firstName() : $this->faker->firstName() . ' ' . $this->faker->lastName(),
            'text' => $rand_number == 1 ? $this->faker->sentence() : $this->faker->paragraph(),
            'rating' => random_int(0, 5),
            'created_at' => $this->faker->dateTime(),
            'updated_at' => $this->faker->dateTime()
        ];
    }

}
