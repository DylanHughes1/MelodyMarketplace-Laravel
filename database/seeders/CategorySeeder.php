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
                'name' => 'Cuerda',
                'image_link' => 'https://img.freepik.com/vector-premium/conjunto-instrumentos-musicales-cuerda-pulsada_273525-744.jpg?w=900',
                'image_path' => '',
            ],

            [
                'name' => 'Percusion',
                'image_link' => 'https://img.freepik.com/vector-premium/conjunto-instrumentos-musicales-cuerda-pulsada_273525-744.jpg?w=900',
                'image_path' => '',
            ],

            [
                'name' => 'Viento',
                'image_link' => 'https://img.freepik.com/vector-premium/conjunto-instrumentos-musicales-cuerda-pulsada_273525-744.jpg?w=900',
                'image_path' => '',
            ],

            [
                'name' => 'Sonido',
                'image_link' => 'https://img.freepik.com/vector-premium/conjunto-instrumentos-musicales-cuerda-pulsada_273525-744.jpg?w=900',
                'image_path' => '',
            ],
        ];

        DB::table('category')->insert($data);
    }
}
