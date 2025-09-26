<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use App\Models\Company;

class CompanySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Company::create([
            'name'    => 'Mr. Paul Bakers',
            'address' => '150, BB Road, Suraiya Tower, narayangonj-1400',
            'email'   => 'mrpaulbakers2025@gmail.com',
            'phone'   => '01675962338',
            'website' => 'https://bekare.deegau.com/',
        ]);
    }
}
