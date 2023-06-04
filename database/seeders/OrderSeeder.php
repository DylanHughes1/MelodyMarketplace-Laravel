<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class OrderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        $data = [
            [
                'delivery_address' => 'Terrada 123',
                'client_id' => '1',
            ],

            [
                'delivery_address' => 'Juan Molina 256',
                'client_id' => '1',
            ],
        ];

        DB::table('order')->insert($data);
    }
}