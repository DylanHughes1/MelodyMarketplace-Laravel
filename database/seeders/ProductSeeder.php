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
                'subcategory_id' => 2,  
            ],

            [
                'name' => 'Flauta Travesera',
                'price' => '78000',
                'subcategory_id' => 2,  
            ],

            [
                'name' => 'Flauta Flautín',
                'price' => '12300',
                'subcategory_id' => 2,  
            ],

            [
                'name' => 'Flauta Ocarina',
                'price' => '9990',
                'subcategory_id' => 2,  
            ],
            
            [
                'name' => 'Piano digital',
                'price' => '80000', 
                'subcategory_id' => 1,   
            ],

            [
                'name' => 'Piano acústico',
                'price' => '100000', 
                'subcategory_id' => 1,   
            ],

            [
                'name' => 'Piano de cola',
                'price' => '120000', 
                'subcategory_id' => 1,   
            ],

            [
                'name' => 'Guitarra Electrica',
                'price' => '40000',
                'subcategory_id' => 3,  
            ],

            [
                'name' => 'Guitarra Criolla',
                'price' => '25000',
                'subcategory_id' => 3,  
            ],

            [
                'name' => 'Amplificador Digital',
                'price' => '11000',
                'subcategory_id' => 5,  
            ],

            [
                'name' => 'Amplificador Híbrido',
                'price' => '70000',
                'subcategory_id' => 5,  
            ],

            [
                'name' => 'Batería electrónica',
                'price' => '9000',
                'subcategory_id' => 4,  
            ],

            [
                'name' => 'Batería acústica',
                'price' => '160000',
                'subcategory_id' => 4,  
            ],
        ];

        DB::table('product')->insert($data);
    }
}