<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProductAttributeSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        \App\Models\ProductAttribute::truncate();
        
        \App\Models\ProductAttribute::factory()
                                        ->count(103)
                                        ->create();
    }
}
