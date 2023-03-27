<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ClientSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            [
                'name' => 'Dylan Maslein',
                'email' => 'dylan_maslein@outlook.com',
                'password' => bcrypt('web2023'),
                'credit_card' => '0000-1111-2222-3333'   
            ],
        ];

        DB::table('client')->insert($data);
    }
}
