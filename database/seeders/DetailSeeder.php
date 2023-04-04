<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
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
        ];

        DB::table('detail')->insert($data);
    }
}
