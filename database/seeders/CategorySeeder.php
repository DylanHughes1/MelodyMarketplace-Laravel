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
            ],

            [
                'name' => 'Pianos',
            ],

            [
                'name' => 'Amplificadores',
            ],

            [
                'name' => 'Flautas',
            ],
        ];

        DB::table('category')->insert($data);
    }
}
