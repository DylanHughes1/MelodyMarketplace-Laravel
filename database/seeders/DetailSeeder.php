<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DetailSeeder extends Seeder
{
    // estructura que tenga precio total por detalle

    public function run(): void
    {
        $data = [
            [
                'product_id' => 1,
                
                'order_id' => 1,
            ],

            [
                'product_id' => 2,
                
                'order_id' => 1,
            ],

            [
                'product_id' => 3,
                
                'order_id' => 1,
            ],

            [
                'product_id' => 4,
                
                'order_id' => 2,
            ],

            [
                'product_id' => 5,
                
                'order_id' => 2,
            ],

            [
                'product_id' => 6,
                
                'order_id' => 2,
            ],
        ];

        DB::table('detail')->insert($data);
    }
}
