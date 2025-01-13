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

        if ($rand_number == 2) {
            return [
                'category_id' => random_int(1, 8),
                'title' => '08-10.05 - 80 День Победы в Волгограде',
                'slug' => '08-10-05-80-den-pobedy-v-volgograde-' . $rand_number . $price,
                'image' => 'public/uploads/temp-products/08-10-05-80-den-pobedy-v-volgograde-1.jpg',
                'start_date' => '2025-05-08 00:00:00',
                'price' => 19700,
                'created_at' => '2025-01-13 10:10:10',
                'updated_at' => '2025-01-13 10:10:10'
            ];
        } elseif ($rand_number == 3) {
            return [
                'category_id' => random_int(1, 8),
                'title' => 'Автобусный тур в Дагестан',
                'slug' => 'avtobusnyj-tur-v-dagestan-' . $rand_number . $price,
                'image' => 'public/uploads/temp-products/avtobusnyj-tur-v-dagestan-1.jpg',
                'start_date' => '2025-07-05 00:00:00',
                'price' => 66500,
                'created_at' => '2025-01-13 20:10:10',
                'updated_at' => '2025-01-13 20:10:10'
            ];
        } elseif ($rand_number == 4) {
            return [
                'category_id' => random_int(1, 8),
                'title' => 'Озеро Байкал ЛЕТО',
                'slug' => 'ozero-bajkal-leto-' . $rand_number . $price,
                'image' => 'public/uploads/temp-products/ozero-bajkal-leto-1.jpg',
                'start_date' => '2025-07-12 00:00:00',
                'price' => 66500,
                'created_at' => '2025-01-13 30:10:10',
                'updated_at' => '2025-01-13 30:10:10'
            ];
        } elseif ($rand_number == 5) {
            return [
                'category_id' => random_int(1, 8),
                'title' => 'Астрахань. Цветение лотоса',
                'slug' => 'astrahan-cvetenie-lotosa-' . $rand_number . $price,
                'image' => 'public/uploads/temp-products/astrahan-cvetenie-lotosa-1.jpg',
                'start_date' => '2025-07-26 00:00:00',
                'price' => 49200,
                'created_at' => '2025-01-13 30:20:10',
                'updated_at' => '2025-01-13 30:20:10'
            ];
        } else {
            return [
                'category_id' => random_int(1, 10),
                'title' => $title,
                'slug' => Str::slug($title),
                'image' => 'public/uploads/products/product' . $rand_number . '.jpg',
                'start_date' => $this->faker->dateTime(),
                'price' => random_int(900, 200000),
                'created_at' => $this->faker->dateTime(),
                'updated_at' => $this->faker->dateTime()
            ];
        }
    }

}
