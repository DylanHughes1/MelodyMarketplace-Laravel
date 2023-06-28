<?php

namespace Database\Seeders;

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
                'password' => 'asd123'
            ],
        ];

        DB::table('client')->insert($data);
    }
}
