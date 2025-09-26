<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Excategory;
use App\Models\Exsubcategory;

class ExSubCategroySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $subcategories = [
            ['cat_id' => 1, 'name' => 'Groceries'],
            ['cat_id' => 1, 'name' => 'Restaurants'],
            ['cat_id' => 2, 'name' => 'Bus'],
            ['cat_id' => 2, 'name' => 'Taxi'],
            ['cat_id' => 3, 'name' => 'Movies'],
            ['cat_id' => 3, 'name' => 'Games'],
            ['cat_id' => 4, 'name' => 'Electricity'],
            ['cat_id' => 4, 'name' => 'Water'],
            ['cat_id' => 5, 'name' => 'Medicine'],
            ['cat_id' => 5, 'name' => 'Doctor'],
        ];

        foreach ($subcategories as $subcategory) {
            Exsubcategory::create($subcategory);
        }
    }
}
