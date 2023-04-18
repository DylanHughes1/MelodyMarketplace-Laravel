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
            ],

            [
                'name' => 'Flautas',
                'category_id' => 3,
            ],

            [
                'name' => 'Guitarras',
                'category_id' => 1,
            ],

            [
                'name' => 'Baterias',
                'category_id' => 2,
            ],

            [
                'name' => 'Amplificadores',
                'category_id' => 4,
            ],
            
        ];

        DB::table('subcategory')->insert($data);
    }
}
