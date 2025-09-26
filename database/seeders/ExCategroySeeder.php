<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Excategory;

class ExCategroySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categories = [
            ['name' => 'Food'],
            ['name' => 'Transport'],
            ['name' => 'Entertainment'],
            ['name' => 'Bills & Utilities'],
            ['name' => 'Health'],
        ];

        foreach ($categories as $category) {
            Excategory::create($category);
        }
    }
}
