<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;


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
                'image_link' => 'https://artemusical.com.ar/wp/wp-content/uploads/2022/05/Yamaha-YRS-23.jpg',
                'image_path' => '',
                'subcategory_id' => 2, 
                'hasStock' => false, 
            ],

            [
                'name' => 'Flauta Travesera',
                'price' => '78000',
                'image_link' => 'https://http2.mlstatic.com/D_NQ_NP_980976-MLA48562553704_122021-O.webp',
                'image_path' => '',
                'subcategory_id' => 2,  
                'hasStock' => true, 
            ],

            [
                'name' => 'Flauta Flautín',
                'price' => '12300',
                'image_link' => 'https://http2.mlstatic.com/D_NQ_NP_689354-MLA46713619296_072021-O.webp',
                'image_path' => '',
                'subcategory_id' => 2,  
                'hasStock' => false, 
            ],

            [
                'name' => 'Flauta Ocarina',
                'price' => '9990',
                'image_link' => 'https://http2.mlstatic.com/D_NQ_NP_738969-MLM32008302575_082019-O.webp',
                'image_path' => '',
                'subcategory_id' => 2,
                'hasStock' => true,   
            ],
            
            [
                'name' => 'Piano digital',
                'price' => '80000', 
                'image_link' => 'https://http2.mlstatic.com/D_NQ_NP_973957-MLA44744016750_012021-O.webp',
                'image_path' => '',
                'subcategory_id' => 1,  
                'hasStock' => true,  
            ],

            [
                'name' => 'Piano acústico',
                'price' => '100000', 
                'image_link' => 'https://http2.mlstatic.com/D_NQ_NP_855675-MLA45345805808_032021-O.webp',
                'image_path' => '',
                'subcategory_id' => 1,   
                'hasStock' => true, 
            ],

            [
                'name' => 'Piano de cola',
                'price' => '120000', 
                'image_link' => 'https://http2.mlstatic.com/D_NQ_NP_762057-MLA51455749682_092022-O.webp',
                'image_path' => '',
                'subcategory_id' => 1,   
                'hasStock' => true, 
            ],

            [
                'name' => 'Guitarra Electrica',
                'price' => '40000',
                'image_link' => 'https://http2.mlstatic.com/D_NQ_NP_946829-MLA51667434453_092022-O.webp',
                'image_path' => '',
                'subcategory_id' => 3,  
                'hasStock' => true, 
            ],

            [
                'name' => 'Guitarra Criolla',
                'price' => '25000',
                'image_link' => 'https://http2.mlstatic.com/D_NQ_NP_950354-MLA50448314181_062022-O.webp',
                'image_path' => '',
                'subcategory_id' => 3,  
                'hasStock' => true, 
            ],

            [
                'name' => 'Amplificador Digital',
                'price' => '11000',
                'image_link' => 'https://guitarriego.com/wp-content/uploads/2020/01/Fender-Mustang-GT-100-Guitarriego-1024x769.jpg',
                'image_path' => '',
                'subcategory_id' => 5,  
                'hasStock' => true, 
            ],

            [
                'name' => 'Amplificador Valvular',
                'price' => '70000',
                'image_link' => 'https://http2.mlstatic.com/D_NQ_NP_869099-MLA44296256930_122020-O.webp',
                'image_path' => '',
                'subcategory_id' => 5,  
                'hasStock' => true, 
            ],

            [
                'name' => 'Batería electrónica',
                'price' => '9000',
                'image_link' => 'https://http2.mlstatic.com/D_NQ_NP_979346-MLA48354259881_112021-O.webp',
                'image_path' => '',
                'subcategory_id' => 4,  
                'hasStock' => true, 
            ],

            [
                'name' => 'Batería acústica',
                'price' => '160000',
                'image_link' => 'https://http2.mlstatic.com/D_NQ_NP_771315-MLA50435892852_062022-O.webp',
                'image_path' => '',
                'subcategory_id' => 4,  
                'hasStock' => true, 
            ],
        ];

        DB::table('product')->insert($data);
    }
}