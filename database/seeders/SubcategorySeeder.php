<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use App\Models\Category;
use App\Models\Subcategory;

class SubcategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $subcategories = [
            "BREAD & BUNS" => ["Burger Series","Bun Series","Bread Series","Rolls & Croissant","Special Breads"],
            "FAST FOOD ITEMS" => ["Burger Items","Roll Items","Sandwich Items","Pizza & Pie","Special Fast Food"],
            "TOAST & BISCUITS" => ["Toast Items","Cookies","Nut Cookies","Dry Cakes","Special Biscuits"],
            "STICK & PUFFS" => ["Stick Series","Garlic & Cheese","Puffs Sweet","Puffs Spicy","Special Puffs"],
            "CELEBRATION CAKE" => ["Chocolate Series","Vanilla & Mocha","Fruit Cakes","Designer Cakes","Premium Cakes"],
            "SWEET" => ["Roshogolla & Jam","Chom Chom Series","Sondesh Items","Laddu & Doi","Special Traditional"],
        ];


        foreach ($subcategories as $categoryName => $subs) {
            $category = Category::where('name', $categoryName)->first();
            if (!$category) {
                continue;
            }

            foreach ($subs as $sub) {
                Subcategory::updateOrCreate(
                    ['name' => $sub, 'category_id' => $category->id],
                    []
                );
            }
        }

    }
}
