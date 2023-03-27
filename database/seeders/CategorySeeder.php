<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

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

        DB::table('client')->insert($data);
    }
}
