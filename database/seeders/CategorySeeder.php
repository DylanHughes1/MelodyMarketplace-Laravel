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
                'image_link' => 'https://st2.depositphotos.com/1000874/6436/i/600/depositphotos_64369181-stock-photo-music-percussion-instruments.jpg',
                'image_path' => '',
            ],

            [
                'name' => 'Viento',
                'image_link' => 'https://preview.free3d.com/img/2018/11/2374242109600302756/pb10yy7j.jpg',
                'image_path' => '',
            ],

            [
                'name' => 'Sonido',
                'image_link' => 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRK7KbmAO6OH_ardiypBCTsH1ckBhHKlRwIcQ&usqp=CAU',
                'image_path' => '',
            ],
        ];

        DB::table('category')->insert($data);
    }
}
