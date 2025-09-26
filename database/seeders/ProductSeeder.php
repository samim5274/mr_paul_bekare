<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

use App\Models\Category;
use App\Models\Subcategory;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        DB::table('products')->truncate();
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');

        $categoryMap = Category::pluck('id', 'name')->toArray();
        $subcategoryMap = Subcategory::pluck('id', 'name')->toArray();

        $productsData = [
            // BREAD & BUNS
            ['category' => 'BREAD & BUNS', 'sub' => 'Burger Series', 'name' => 'Burger Bun', 'size' => '75gm (2pcs)', 'price' => 40],
            ['category' => 'BREAD & BUNS', 'sub' => 'Bun Series', 'name' => 'Tiffin Bun', 'size' => '105gm (4pcs)', 'price' => 50],
            ['category' => 'BREAD & BUNS', 'sub' => 'Bun Series', 'name' => 'Butter Bun', 'size' => '100gm', 'price' => 40],
            ['category' => 'BREAD & BUNS', 'sub' => 'Bun Series', 'name' => 'Family Bun', 'size' => '220gm', 'price' => 90],
            ['category' => 'BREAD & BUNS', 'sub' => 'Bread Series', 'name' => 'Sandwich Bread', 'size' => '400gm', 'price' => 80],
            ['category' => 'BREAD & BUNS', 'sub' => 'Bread Series', 'name' => 'Sandwich Bread', 'size' => '800gm', 'price' => 160],
            ['category' => 'BREAD & BUNS', 'sub' => 'Bread Series', 'name' => 'Milk Bread', 'size' => '400gm', 'price' => 100],
            ['category' => 'BREAD & BUNS', 'sub' => 'Rolls & Croissant', 'name' => 'Raisins Sesame Roll', 'size' => 'N/A', 'price' => 90],
            ['category' => 'BREAD & BUNS', 'sub' => 'Special Breads', 'name' => 'Sandwich Bread', 'size' => '1000gm', 'price' => 200],

            // FAST FOOD ITEMS
            ['category' => 'FAST FOOD ITEMS', 'sub' => 'Burger Items', 'name' => 'Chicken Cheese Burger', 'size' => 'N/A', 'price' => 120],
            ['category' => 'FAST FOOD ITEMS', 'sub' => 'Burger Items', 'name' => 'Chicken Crispy Burger', 'size' => 'N/A', 'price' => 140],
            ['category' => 'FAST FOOD ITEMS', 'sub' => 'Burger Items', 'name' => 'Chicken Mexican Burger', 'size' => 'N/A', 'price' => 140],
            ['category' => 'FAST FOOD ITEMS', 'sub' => 'Burger Items', 'name' => 'Chicken Sub Burger', 'size' => 'N/A', 'price' => 130],
            ['category' => 'FAST FOOD ITEMS', 'sub' => 'Burger Items', 'name' => 'Chicken Baby Burger', 'size' => 'N/A', 'price' => 50],
            ['category' => 'FAST FOOD ITEMS', 'sub' => 'Burger Items', 'name' => 'Chicken Mini Burger', 'size' => 'N/A', 'price' => 50],
            ['category' => 'FAST FOOD ITEMS', 'sub' => 'Pizza & Pie', 'name' => 'Chicken Pie', 'size' => 'N/A', 'price' => 70],
            ['category' => 'FAST FOOD ITEMS', 'sub' => 'Special Fast Food', 'name' => 'Chicken Bun', 'size' => 'N/A', 'price' => 80],
            ['category' => 'FAST FOOD ITEMS', 'sub' => 'Special Fast Food', 'name' => 'Chicken Patties', 'size' => 'N/A', 'price' => 80],
            ['category' => 'FAST FOOD ITEMS', 'sub' => 'Special Fast Food', 'name' => 'Vegetable Patties', 'size' => 'N/A', 'price' => 50],
            ['category' => 'FAST FOOD ITEMS', 'sub' => 'Roll Items', 'name' => 'Vegetable Roll', 'size' => 'N/A', 'price' => 40],
            ['category' => 'FAST FOOD ITEMS', 'sub' => 'Roll Items', 'name' => 'Shwarma Roll', 'size' => 'N/A', 'price' => 120],
            ['category' => 'FAST FOOD ITEMS', 'sub' => 'Pizza & Pie', 'name' => 'Meduim Pizza', 'size' => 'N/A', 'price' => 150],
            ['category' => 'FAST FOOD ITEMS', 'sub' => 'Sandwich Items', 'name' => 'Chicken Sandwich', 'size' => 'N/A', 'price' => 100],
            ['category' => 'FAST FOOD ITEMS', 'sub' => 'Sandwich Items', 'name' => 'Club Sandwich', 'size' => 'N/A', 'price' => 120],
            ['category' => 'FAST FOOD ITEMS', 'sub' => 'Sandwich Items', 'name' => 'Grill Sandwich', 'size' => 'N/A', 'price' => 100],
            ['category' => 'FAST FOOD ITEMS', 'sub' => 'Sandwich Items', 'name' => 'Sub Sandwich', 'size' => 'N/A', 'price' => 120],
            ['category' => 'FAST FOOD ITEMS', 'sub' => 'Roll Items', 'name' => 'Russian Roll', 'size' => 'N/A', 'price' => 80],

            // TOAST & BISCUITS
            ['category' => 'TOAST & BISCUITS', 'sub' => 'Toast Items', 'name' => 'Plain Toast', 'size' => '400gm', 'price' => 120],
            ['category' => 'TOAST & BISCUITS', 'sub' => 'Toast Items', 'name' => 'Butter Toast (White)', 'size' => '400gm', 'price' => 120],
            ['category' => 'TOAST & BISCUITS', 'sub' => 'Toast Items', 'name' => 'Butter Toast (Mix)', 'size' => '400gm', 'price' => 150],
            ['category' => 'TOAST & BISCUITS', 'sub' => 'Toast Items', 'name' => 'Bela Toast', 'size' => '400gm', 'price' => 130],
            ['category' => 'TOAST & BISCUITS', 'sub' => 'Toast Items', 'name' => 'Sugar Free Toast', 'size' => '130gm', 'price' => 130],
            ['category' => 'TOAST & BISCUITS', 'sub' => 'Toast Items', 'name' => 'Bread Toast', 'size' => '350gm', 'price' => 130],
            ['category' => 'TOAST & BISCUITS', 'sub' => 'Toast Items', 'name' => 'Finger Toast', 'size' => '350gm', 'price' => 130],
            ['category' => 'TOAST & BISCUITS', 'sub' => 'Cookies', 'name' => 'Orange Cookies', 'size' => '1kg', 'price' => 600],
            ['category' => 'TOAST & BISCUITS', 'sub' => 'Cookies', 'name' => 'Ovaltine Cookies', 'size' => '1kg', 'price' => 600],
            ['category' => 'TOAST & BISCUITS', 'sub' => 'Cookies', 'name' => 'Horlicks Cookies', 'size' => '1kg', 'price' => 600],
            ['category' => 'TOAST & BISCUITS', 'sub' => 'Cookies', 'name' => 'Salted Cookies', 'size' => '1kg', 'price' => 500],
            ['category' => 'TOAST & BISCUITS', 'sub' => 'Cookies', 'name' => 'Salted Milky', 'size' => '1kg', 'price' => 550],
            ['category' => 'TOAST & BISCUITS', 'sub' => 'Dry Cakes', 'name' => 'Dry Cake', 'size' => '1kg', 'price' => 600],
            ['category' => 'TOAST & BISCUITS', 'sub' => 'Dry Cakes', 'name' => 'Chocolate Dry Cake', 'size' => '1kg', 'price' => 600],
            ['category' => 'TOAST & BISCUITS', 'sub' => 'Nut Cookies', 'name' => 'Nut Cookies', 'size' => '1kg', 'price' => 600],
            ['category' => 'TOAST & BISCUITS', 'sub' => 'Nut Cookies', 'name' => 'Almond Cookies', 'size' => '1kg', 'price' => 600],
            ['category' => 'TOAST & BISCUITS', 'sub' => 'Nut Cookies', 'name' => 'Raisins Cookies', 'size' => '1kg', 'price' => 600],
            ['category' => 'TOAST & BISCUITS', 'sub' => 'Special Biscuits', 'name' => 'Love Cookies', 'size' => '1kg', 'price' => 600],
            ['category' => 'TOAST & BISCUITS', 'sub' => 'Special Biscuits', 'name' => 'Cheese Puff', 'size' => '1kg', 'price' => 600],
            ['category' => 'TOAST & BISCUITS', 'sub' => 'Special Biscuits', 'name' => 'Sugar Puff', 'size' => '1kg', 'price' => 500],
            ['category' => 'TOAST & BISCUITS', 'sub' => 'Special Biscuits', 'name' => 'Spicy Puff', 'size' => '1kg', 'price' => 480],
        ];

        $skuCounter = 1;
        foreach ($productsData as $product) {
            // check category & subcategory
            if (!isset($categoryMap[$product['category']]) || !isset($subcategoryMap[$product['sub']])) {
                continue;
            }

            DB::table('products')->insert([
                'name' => $product['name'],
                'sku' => 'PRD' . str_pad($skuCounter++, 3, '0', STR_PAD_LEFT),
                'category_id' => $categoryMap[$product['category']],
                'subcategory_id' => $subcategoryMap[$product['sub']],
                'price' => $product['price'],
                'stock' => rand(5, 50),
                'description' => null,
                'availability' => 1,
                'size' => $product['size'],
                'ingredients' => null,
                'manufactured' => now()->subDays(rand(1, 7)),
                'expired' => now()->addDays(rand(30, 365)),
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
