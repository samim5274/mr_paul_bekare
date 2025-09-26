<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use App\Models\Category;
use App\Models\Subcategory;
use App\Models\Product;
use App\Models\Branch;
use App\Models\Company;
use App\Models\PaymentMethod;
use App\Models\Excategory;
use App\Models\ExSubCategroySeeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            CategorySeeder::class,
            SubcategorySeeder::class,
            ProductSeeder::class,
            BranchSeeder::class,
            CompanySeeder::class,
            PaymentMethodSeeder::class,
            ExCategroySeeder::class,
            ExSubCategroySeeder::class,
        ]);
    }
}
