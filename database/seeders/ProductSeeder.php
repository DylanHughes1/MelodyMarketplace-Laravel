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
                'price' => '10000',
                'category_id' => 4  
            ],

            [
                'name' => 'Piano digital',
                'price' => '80000', 
                'category_id' => 2,   
            ],

            [
                'name' => 'Guitarra Electrica',
                'price' => '40000',
                'category_id' => 1,  
            ],

            [
                'name' => 'Guitarra Criolla',
                'price' => '25000',
                'category_id' => 1,  
            ],
        ];

        DB::table('product')->insert($data);
    }
}