<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            [
                'name' => 'Guitarras',
                'image_link' => 'https://guitargearfinder.com/wp-content/uploads/2019/12/types-of-guitars.jpg',
                'image_path' => '',
            ],

            [
                'name' => 'Bajos',
                'image_link' => 'https://www.gearsavvy.com/wp-content/uploads/2021/02/types-of-bass-guitars.jpg',
                'image_path' => '',
            ],

            [
                'name' => 'Amplificadores y Efectos',
                'image_link' => 'https://guitargearfinder.com/wp-content/uploads/2019/03/guitar-amps-explained.jpg',
                'image_path' => '',
            ],

            [
                'name' => 'Baterias',
                'image_link' => 'https://www.samash.com/media/wysiwyg/RTD17KV2X.jpg?quality=60&width=338&height=338&auto=webp',
                'image_path' => '',
            ],
            [
                'name' => 'Teclados y MIDI',
                'image_link' => 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSxFcu2avFCiSGUk0z-PlDB_-8U_adUfSza3Q&usqp=CAU',
                'image_path' => '',
            ],
            [
                'name' => 'Grabación',
                'image_link' => 'https://media.guitarcenter.com/is/image/MMGS7/Frameworks-Wall-Mount-Speaker-Stands-Pair/J13848000000000-00-220x220.jpg',
                'image_path' => '',
            ],
        ];

        DB::table('category')->insert($data);
    }
}
