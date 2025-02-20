<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProductCategorySeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        \App\Models\ProductCategory::factory()
                                    ->count(101)
                                    ->sequence(fn ($sequence) => ['product_id' => $sequence->index + 1])
                                    ->create();
    }
}
