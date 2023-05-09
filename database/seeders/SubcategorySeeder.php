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

             /** ---------- */
             [
                'name' => 'Baterias Acústicas',
                'category_id' => 4,
                'image_link' => 'https://www.samash.com/media/wysiwyg/nci-acoustic-drums.png?quality=60&width=168&height=201&auto=webp',
                'image_path' => '',
            ],
            [
                'name' => 'Baterias Electrónicas',
                'category_id' => 4,
                'image_link' => 'https://www.samash.com/media/wysiwyg/nci-electronic-drums.png?quality=60&width=168&height=201&auto=webp',
                'image_path' => '',
            ],
            [
                'name' => 'Accesorios de Baterias',
                'category_id' => 4,
                'image_link' => 'https://www.samash.com/media/wysiwyg/nci-drum-accessories.png?quality=60&width=168&height=201&auto=webp',
                'image_path' => '',
            ],

             /** ---------- */
             [
                'name' => 'Pianos Digitales',
                'category_id' => 5,
                'image_link' => 'https://www.samash.com/media/wysiwyg/nci-digital-pianos.png?quality=60&width=168&height=201&auto=webp',
                'image_path' => '',
            ],
            [
                'name' => 'Órganos',
                'category_id' => 5,
                'image_link' => 'https://www.samash.com/media/wysiwyg/nci-organs.png?quality=60&width=168&height=201&auto=webp',
                'image_path' => '',
            ],
            [
                'name' => 'Teclados y Controladores MIDI',
                'category_id' => 5,
                'image_link' => 'https://www.samash.com/media/wysiwyg/nci-midi-controllers-keyboards.png?quality=60&width=168&height=201&auto=webp',
                'image_path' => '',
            ],

            /** ---------- */
            [
                'name' => 'Monitores de Estudio',
                'category_id' => 6,
                'image_link' => 'https://www.samash.com/media/wysiwyg/nci-studio-monitors.png?quality=60&width=168&height=201&auto=webp',
                'image_path' => '',
            ],
            [
                'name' => 'Interfaces de audio',
                'category_id' => 6,
                'image_link' => 'https://www.samash.com/media/wysiwyg/nci-audio-interfaces.png?quality=60&width=168&height=201&auto=webp',
                'image_path' => '',
            ],
            [
                'name' => 'Micrófonos',
                'category_id' => 6,
                'image_link' => 'https://www.samash.com/media/wysiwyg/nci-studio-condensor-mics.png?quality=60&width=168&height=201&auto=webp',
                'image_path' => '',
            ],
            
        ];

        DB::table('subcategory')->insert($data);
    }
}
