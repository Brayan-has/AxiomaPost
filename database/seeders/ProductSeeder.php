<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Product;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // make an intance from de model for create temporal data

        $sales = Product::create([
            "code" => "20210325",
            "name" => "Arroz",
            "stock" => 14,
            "price" => 12000,
            "id_category" => 1
        ]);
        
        $sales = Product::create([
            "code" => "09870987",
            "name" => "Papá",
            "stock" => 14,
            "price" => 16000,
            "id_category" => 1
        ]);
        
        $sales = Product::create([
            "code" => "654987321",
            "name" => "Frutas variadas",
            "stock" => 148,
            "price" => 32000,
            "id_category" => 1
        ]);
        
        $sales = Product::create([
            "code" => "654657987",
            "name" => "Cilantro",
            "stock" => 1445,
            "price" => 6000,
            "id_category" => 1
        ]);
        
        $sales = Product::create([
            "code" => "654321987",
            "name" => "Papaya",
            "stock" => 1445,
            "price" => 12000,
            "id_category" => 1
        ]);
        
        $sales = Product::create([
            "code" => "09878673",
            "name" => "Manzana",
            "stock" => 147,
            "price" => 9000,
            "id_category" => 1
        ]);
        
        $sales = Product::create([
            "code" => "20210325",
            "name" => "Pera",
            "stock" => 1444,
            "price" => 12000,
            "id_category" => 1
        ]);
        
        $sales = Product::create([
            "code" => "65498700",
            "name" => "Yuca",
            "stock" => 1455,
            "price" => 11000,
            "id_category" => 1
        ]);
        
        $sales = Product::create([
            "code" => "65498731",
            "name" => "Naranja",
            "stock" => 143,
            "price" => 8000,
            "id_category" => 1
        ]);
        
        $sales = Product::create([
            "code" => "20210325",
            "name" => "Durazno",
            "stock" => 1456,
            "price" => 12000,
            "id_category" => 10
        ]);
        
        $sales = Product::create([
            "code" => "20210325",
            "name" => "Mango",
            "stock" => 14,
            "price" => 12000,
            "id_category" => 1
        ]);
        
        $sales = Product::create([
            "code" => "20210325",
            "name" => "Mandarina",
            "stock" => 14,
            "price" => 1200,
            "id_category" => 1
        ]);
        
        $$sales = Product::create([
            "code" => "20210325",
            "name" => "Zapato nike 90",
            "stock" => 35,
            "price" => 1200,
            "id_category" => 2
        ]);
        
        $sales = Product::create([
            "code" => "20210325",
            "name" => "Zapato rebook 23",
            "stock" => 14,
            "price" => 11200,
            "id_category" => 2
        ]);
        
        $sales = Product::create([
            "code" => "20210325",
            "name" => "Zapatos Nike zoon",
            "stock" => 143,
            "price" => 2000,
            "id_category" => 2
        ]);
        
        $sales = Product::create([
            "code" => "20210325",
            "name" => "Zapato nike jordan retro 1",
            "stock" => 143,
            "price" => 2500,
            "id_category" => 2
        ]);

    }
}
