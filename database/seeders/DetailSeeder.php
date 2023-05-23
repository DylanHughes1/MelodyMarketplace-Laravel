<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DetailSeeder extends Seeder
{

    public function run(): void
    {
        $data = [
            [
                'product_id' => 1,
                'quantity' => 1,
                'order_id' => 1,
            ],

            [
                'product_id' => 2,
                'quantity' => 2,
                'order_id' => 1,
            ],

            [
                'product_id' => 3,
                'quantity' => 3,
                'order_id' => 1,
            ],

            [
                'product_id' => 4,
                'quantity' => 4,
                'order_id' => 2,
            ],

            [
                'product_id' => 5,
                'quantity' => 5,
                'order_id' => 2,
            ],

            [
                'product_id' => 6,
                'quantity' => 6,
                'order_id' => 2,
            ],
        ];

        DB::table('detail')->insert($data);
    }
}
