<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Employee;

class EmployeeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // make an intance from de model for create temporal data

        $employees = Employee::create([

            "name" => "Alejandra",
            "lastname" => "Parra",
            "email" => "Ale12@gmail.com",
            "password" => "alejandra@123",
            "id_rol" => 1
        ]);
        $employees = Employee::create([

            "name" => "Juan Fernando",
            "lastname" => "Iglesias",
            "email" => "Jpq2@gmail.com",
            "password" => "r:Oe9F53adc[",
            "id_rol" => 2
        ]);
        $employees = Employee::create([

            "name" => "Felipe Aguirre",
            "lastname" => "Bedoya",
            "email" => "BedoyaAFe@gmail.com",
            "password" => ";047gvK'|4N]",
            "id_rol" => 3
        ]);
        $employees = Employee::create([

            "name" => "Cintia ",
            "lastname" => "Herrera",
            "email" => "profreulusekau-2289@yopmail.com",
            "password" => "5857-SQcK({3",
            "id_rol" => 4
        ]);
        $employees = Employee::create([

            "name" => "Sergio ",
            "lastname" => "Suarez",
            "email" => "yojaboyouru-9710@yopmail.com",
            "password" => "@/Bw2!22;6VM",
            "id_rol" => 5
        ]);
        $employees = Employee::create([

            "name" => "Oscar ",
            "lastname" => "Ruiz",
            "email" => "proyinnellaumoi-7034@yopmail.com",
            "password" => "k~~snH}'48:1",
            "id_rol" => 6
        ]);
        $employees = Employee::create([

            "name" => "Alejandra",
            "lastname" => "Parra",
            "email" => "paffattoufroiyeu-5925@yopmail.com",
            "password" => "fddHCNk}A865",
            "id_rol" => 7
        ]);
        $employees = Employee::create([

            "name" => "Silvia ",
            "lastname" => "Suarez",
            "email" => "fetramoucacrei-5249@yopmail.com",
            "password" => "-49>r!RMhA99",
            "id_rol" => 8
        ]);
        $employees = Employee::create([

            "name" => "Liliana ",
            "lastname" => "Garcia",
            "email" => "joreitreucrigra-7315@yopmail.com",
            "password" => "Nn&=vK5R1,(3",
            "id_rol" => 9
        ]);
        $employees = Employee::create([

            "name" => "Julio ",
            "lastname" => "Alvarez",
            "email" => "brauyaffosoiya-5654@yopmail.com",
            "password" => "l0L£9U7q/Wg9",
            "id_rol" => 10
        ]);
        $employees = Employee::create([

            "name" => "Nélida",
            "lastname" => "Garcia",
            "email" => "woireseuleimu-2126@yopmail.com",
            "password" => "_$%ufR4&38F.",
            "id_rol" => 11
        ]);
        $employees = Employee::create([

            "name" => "Mónica",
            "lastname" => "Perez",
            "email" => "noiddoimacroda-9154@yopmail.com",
            "password" => "WeDCh0pFF}61",
            "id_rol" => 12
        ]);
        $employees = Employee::create([

            "name" => "Daniel",
            "lastname" => "Garcia",
            "email" => "duffequiyekoi-7807@yopmail.com",
            "password" => "9P+8';0CQr£5",
            "id_rol" => 13
        ]);
        $employees = Employee::create([

            "name" => "Víctor",
            "lastname" => "Aguirre",
            "email" => "weidiffegroxo-4582@yopmail.com",
            "password" => "}m25CEj'&w}5",
            "id_rol" => 14
        ]);
        $employees = Employee::create([

            "name" => "Norma ",
            "lastname" => "Parra",
            "email" => "veihipawennu-8123@yopmail.com",
            "password" => "0a2I:2|R3Z-",
            "id_rol" => 15
        ]);
        $employees = Employee::create([

            "name" => "Patricia ",
            "lastname" => "Gimenez",
            "email" => "xohacauttayo-9147@yopmail.com",
            "password" => "3,5|j4MF_gU",
            "id_rol" => 16
        ]);

    }
}
