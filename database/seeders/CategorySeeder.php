<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Category;

class CategorySeeder extends Seeder
{
    public function run(): void
    {
        Category::create(['name' => 'Electronics', 'description' => 'Electronic devices']);
        Category::create(['name' => 'Fashion', 'description' => 'Clothing and accessories']);
        Category::create(['name' => 'Books', 'description' => 'Books and magazines']);
        Category::create(['name' => 'Home & Garden', 'description' => 'Home improvement']);
        Category::create(['name' => 'Sports', 'description' => 'Sports equipment']);
    }
}