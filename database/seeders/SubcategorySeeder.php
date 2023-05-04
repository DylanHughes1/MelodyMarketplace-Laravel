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
                'name' => 'Guitarras Eléctricas',
                'category_id' => 1,
                'image_link' => 'https://www.samash.com/media/wysiwyg/nci-electric-guitars.png?quality=60&width=168&height=201&auto=webp',
                'image_path' => '',
            ],
            [
                'name' => 'Guitarras Acústicas',
                'category_id' => 1,
                'image_link' => 'https://www.samash.com/media/wysiwyg/nci-acoustic-guitars.png?quality=60&width=168&height=201&auto=webp',
                'image_path' => '',
            ],
            [
                'name' => 'Accesorios de Guitarras',
                'category_id' => 1,
                'image_link' => 'https://www.samash.com/media/wysiwyg/nci-guitar-accessories.png?quality=60&width=168&height=201&auto=webp',
                'image_path' => '',
            ],

            /* ---------- */

            [
                'name' => 'Bajos Eléctricos',
                'category_id' => 2,
                'image_link' => 'https://www.samash.com/media/wysiwyg/nci-electric-bass-gtrs.png?quality=60&width=168&height=201&auto=webp',
                'image_path' => '',
            ],
            [
                'name' => 'Bajos Acústicos',
                'category_id' => 2,
                'image_link' => 'https://www.samash.com/media/wysiwyg/nci-acoustic-bass-guitars.png?quality=60&width=168&height=201&auto=webp',
                'image_path' => '',
            ],
            [
                'name' => 'Accesorios de Bajo',
                'category_id' => 2,
                'image_link' => 'https://www.samash.com/media/wysiwyg/nci-bass-gtr-strings.png?quality=60&width=168&height=201&auto=webp',
                'image_path' => '',
            ],
            
             /** ---------- */
            [
                'name' => 'Amplificadores de Guitarra',
                'category_id' => 3,
                'image_link' => 'https://www.samash.com/media/wysiwyg/nci-guitar-amplifiers.png?quality=60&width=168&height=201&auto=webp',
                'image_path' => '',
            ],
            [
                'name' => 'Amplificadores de Bajo',
                'category_id' => 3,
                'image_link' => 'https://www.samash.com/media/wysiwyg/nci-bass-gtr-amps.png?quality=60&width=168&height=201&auto=webp',
                'image_path' => '',
            ],
            [
                'name' => 'Efectos',
                'category_id' => 3,
                'image_link' => 'https://www.samash.com/media/wysiwyg/nci-guitar-pedals-effects.png?quality=60&width=168&height=201&auto=webp',
                'image_path' => '',
            ],
            
        ];

        DB::table('subcategory')->insert($data);
    }
}
