<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use App\Models\Branch;

class BranchSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $branches = [
            [
                'name' => 'Main Branch',
                'location' => 'Gulshan, Dhaka',
                'phone' => '01700000001',
                'manager_id' => 1, // Make sure admin with ID 1 exists
            ],
            [
                'name' => 'Uttara Branch',
                'location' => 'Uttara, Dhaka',
                'phone' => '01700000002',
                'manager_id' => 1,
            ],
            [
                'name' => 'Chittagong Branch',
                'location' => 'Agrabad, Chittagong',
                'phone' => '01700000003',
                'manager_id' => 1,
            ],
        ];

        foreach ($branches as $branch) {
            Branch::create($branch);
        }
    }
}
