<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Schema;

class MealCategorySeeder extends Seeder
{
    

    public function run(): void
    {

        dump(Schema::getColumnListing('meal_categories')); // <- shows columns in table
        \App\Models\MealCategory::insert([
        ['name' => 'Vegetarian'],
        ['name' => 'Gluten-Free'],
        ['name' => 'Keto'],
        ['name' => 'High-Protein'],
    ]);
    }
}
