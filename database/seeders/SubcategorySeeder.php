<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SubcategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            [
                'name' => 'Pianos',
                'category_id' => 1,
                'image_link' => 'https://y6v8e8y4.rocketcdn.me/wp-content/uploads/2022/12/D_957574-MLA52994431941_122022-F.jpg',
                'image_path' => '',
            ],

            [
                'name' => 'Flautas',
                'category_id' => 3,
                'image_link' => 'https://http2.mlstatic.com/D_NQ_NP_729632-MLA25949936468_092017-O.webp',
                'image_path' => '',
            ],

            [
                'name' => 'Guitarras',
                'category_id' => 1,
                'image_link' => 'https://http2.mlstatic.com/D_NQ_NP_741049-MLA53805698986_022023-O.jpg',
                'image_path' => '',
            ],

            [
                'name' => 'Baterias',
                'category_id' => 2,
                'image_link' => 'https://www.shutterstock.com/image-photo/set-drums-isolated-on-white-260nw-1629489898.jpg',
                'image_path' => '',
            ],

            [
                'name' => 'Amplificadores',
                'category_id' => 4,
                'image_link' => 'https://res.cloudinary.com/walmart-labs/image/upload/d_default.jpg/w_960,dpr_auto,f_auto,q_auto:best/mg/gm/1p/images/product-images/img_large/00503046319370l.jpg',
                'image_path' => '',
            ],
            
        ];

        DB::table('subcategory')->insert($data);
    }
}
