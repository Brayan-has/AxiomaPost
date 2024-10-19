<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;


use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        
        $this->call(CustomerSeeder::class);
        $this->call(EmployeeSeeder::class);
        $this->call(SaleSeeder::class);
        $this->call(ProductSeeder::class);
        $this->call(RolSeeder::class);
        // category
        // saledetail
    }
}
