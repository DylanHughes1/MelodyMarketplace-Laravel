<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            [
                'name' => 'Flauta Dulce',
                'price' => '10.000',  
            ],

            [
                'name' => 'Piano digital',
                'price' => '80.000',  
            ],

            [
                'name' => 'Guitarra Electrica',
                'price' => '40.000',  
            ],

            [
                'name' => 'Guitarra Criolla',
                'price' => '25.000',  
            ],
        ];

        DB::table('product')->insert($data);
    }
}