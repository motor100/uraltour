<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Product>
 */
class ProductAttributeFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $rand_product = random_int(1, 103);
        $rand_attribute_id = random_int(1, 5);

        switch ($rand_attribute_id) {
            case 1:
                $rand_attribute_value = random_int(5, 6);
                break;
            case 2:
                $rand_attribute_value = random_int(1, 4);
                break;
            case 3:
                $rand_attribute_value = random_int(7, 8);
                break;
            case 4:
                $rand_attribute_value = random_int(9, 10);
                break;
            case 5:
                $rand_attribute_value = random_int(11, 12);
                break;
        }

        return [
            'product_id' => $rand_product,
            'attribute_value_id' => $rand_attribute_value,
        ];

    }

}
