<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
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
                'image_link' => '',
                'image_path' => '',
            ],
            [
                'name' => 'Teclados y MIDI',
                'image_link' => '',
                'image_path' => '',
            ],
            [
                'name' => 'Grabación',
                'image_link' => '',
                'image_path' => '',
            ],
        ];

        DB::table('category')->insert($data);
    }
}
