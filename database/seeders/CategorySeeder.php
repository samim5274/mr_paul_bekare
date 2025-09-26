<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use App\Models\Category;
use App\Models\Subcategory;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categories = [
            "BREAD & BUNS",
            "FAST FOOD ITEMS",
            "TOAST & BISCUITS",
            "STICK & PUFFS",
            "CELEBRATION CAKE",
            "SWEET",
        ];


        foreach ($categories as $category) {
            Category::create(['name' => $category]);
        }
    }
}
