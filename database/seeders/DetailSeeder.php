<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DetailSeeder extends Seeder
{
    // estructura que tenga precio total por detalle

    public function run(): void
    {
        $data = [
            [
                'amount' => '3',

                'product_id' => '1',
                
                'order_id' => '1',
            ],
        ];
    }
}
