<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Sale;

class SaleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // make an intance from de model for create temporal data

        $sales = Sale::create([
            "sale_date" => "2021-03-25",
            "Total_sale" => 5,
            "id_customer" => 1,
            "id_employee" => 1
        ]);
        
        $sales = Sale::create([
            "sale_date" => "2021-03-25",
            "Total_sale" => 8,
            "id_customer" => 2,
            "id_employee" => 2
        ]);
        
        $sales = Sale::create([
            "sale_date" => "2021-03-25",
            "Total_sale" => 70,
            "id_customer" => 3,
            "id_employee" => 3
        ]);
        
        $sales = Sale::create([
            "sale_date" => "2021-03-25",
            "Total_sale" => 50,
            "id_customer" => 4,
            "id_employee" => 4
        ]);
        
        $sales = Sale::create([
            "sale_date" => "2021-03-25",
            "Total_sale" => 54,
            "id_customer" => 5,
            "id_employee" => 5
        ]);
        
        $sales = Sale::create([
            "sale_date" => "2021-03-25",
            "Total_sale" => 69,
            "id_customer" => 6,
            "id_employee" => 6
        ]);
        
        $sales = Sale::create([
            "sale_date" => "2021-03-25",
            "Total_sale" => 52,
            "id_customer" => 7,
            "id_employee" => 7
        ]);
        
        $sales = Sale::create([
            "sale_date" => "2021-03-25",
            "Total_sale" => 31,
            "id_customer" => 8,
            "id_employee" => 8
        ]);
        
        $sales = Sale::create([
            "sale_date" => "2021-03-25",
            "Total_sale" => 53,
            "id_customer" => 9,
            "id_employee" => 9
        ]);
        
        $sales = Sale::create([
            "sale_date" => "2021-03-25",
            "Total_sale" => 5,
            "id_customer" => 10,
            "id_employee" => 10
        ]);
        
        $sales = Sale::create([
            "sale_date" => "2021-03-25",
            "Total_sale" => 54,
            "id_customer" => 11,
            "id_employee" => 11
        ]);
        
        $sales = Sale::create([
            "sale_date" => "2021-03-25",
            "Total_sale" => 25,
            "id_customer" => 12,
            "id_employee" => 12
        ]);
        
        $sales = Sale::create([
            "sale_date" => "2021-03-25",
            "Total_sale" => 55,
            "id_customer" => 13,
            "id_employee" => 13
        ]);
        
        $sales = Sale::create([
            "sale_date" => "2021-03-25",
            "Total_sale" => 75,
            "id_customer" => 14,
            "id_employee" => 14
        ]);
        
        $sales = Sale::create([
            "sale_date" => "2021-03-25",
            "Total_sale" => 58,
            "id_customer" => 15,
            "id_employee" => 15
        ]);
        
        $sales = Sale::create([
            "sale_date" => "2021-03-25",
            "Total_sale" => 59,
            "id_customer" => 16,
            "id_employee" => 16
        ]);

    }
}
