<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;


class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        $data = [
            /* ---------- */
            [
                'name' => 'Fender Artist Series Stevie Ray Vaughan Stratocaster',
                'price' => '500000',
                'image_link' => 'https://media.guitarcenter.com/is/image/MMGS7/510053000064000-00-720x720.jpg',
                'image_path' => '',
                'subcategory_id' => 1,  
                'hasStock' => true, 
            ],
            [
                'name' => 'Gibson Slash Les Paul Standard Gold Top',
                'price' => '900000',
                'image_link' => 'https://media.guitarcenter.com/is/image/MMGS7/L72812000006000-00-720x720.jpg',
                'image_path' => '',
                'subcategory_id' => 1,  
                'hasStock' => true, 
            ],
            [
                'name' => 'Gibson ES-335 Figured Semi-Hollow',
                'price' => '1000000',
                'image_link' => 'https://media.guitarcenter.com/is/image/MMGS7/L72812000006000-00-720x720.jpg',
                'image_path' => '',
                'subcategory_id' => 1,  
                'hasStock' => true, 
            ],
            /* ---------- */
            [
                'name' => 'Fender CD-60SCE Dreadnought',
                'price' => '75000',
                'image_link' => 'https://media.guitarcenter.com/is/image/MMGS7/L44303000002000-00-720x720.jpg',
                'image_path' => '',
                'subcategory_id' => 2,  
                'hasStock' => true, 
            ],
            [
                'name' => 'Taylor 414ce V-Class Special-Edition',
                'price' => '650000',
                'image_link' => 'https://media.guitarcenter.com/is/image/MMGS7/L26331000001000-00-720x720.jpg',
                'image_path' => '',
                'subcategory_id' => 2,  
                'hasStock' => true, 
            ],
            [
                'name' => 'Epiphone Songmaker DR-100 Vintage Sunburst',
                'price' => '38000',
                'image_link' => 'https://media.guitarcenter.com/is/image/MMGS7/518569000015000-00-720x720.jpg',
                'image_path' => '',
                'subcategory_id' => 2,  
                'hasStock' => true, 
            ],
            /* ---------- */
            [
                'name' => 'Snark Black Silver Snark Clip-On Tuner',
                'price' => '4500',
                'image_link' => 'https://media.guitarcenter.com/is/image/MMGS7/L86249000000000-00-720x720.jpg',
                'image_path' => '',
                'subcategory_id' => 3,  
                'hasStock' => true, 
            ],
            [
                'name' => 'Ernie Ball Regular Slinky 2221 Electric Guitar Strings',
                'price' => '1500',
                'image_link' => 'https://media.guitarcenter.com/is/image/MMGS7/100622000000000-00-720x720.jpg',
                'image_path' => '',
                'subcategory_id' => 3,  
                'hasStock' => true, 
            ],
            [
                'name' => 'Road Runner Electric Guitar Gig Bag in a Box Black',
                'price' => '6800',
                'image_link' => 'https://media.guitarcenter.com/is/image/MMGS7/L53107000001000-00-720x720.jpg',
                'image_path' => '',
                'subcategory_id' => 3,  
                'hasStock' => true, 
            ],
            /* ---------- */
            [
                'name' => 'Fender Player Jazz Bass Plus Top Green Burst',
                'price' => '200000',
                'image_link' => 'https://media.guitarcenter.com/is/image/MMGS7/L75293000002000-00-720x720.jpg',
                'image_path' => '',
                'subcategory_id' => 4,  
                'hasStock' => true, 
            ],
            [
                'name' => 'Squier Affinity Series Precision Bass Olympic White',
                'price' => '63000',
                'image_link' => 'https://media.guitarcenter.com/is/image/MMGS7/L84392000002000-00-720x720.jpg',
                'image_path' => '',
                'subcategory_id' => 4,  
                'hasStock' => true, 
            ],
            [
                'name' => 'Fender American Professional II Precision Bass',
                'price' => '400000',
                'image_link' => 'https://media.guitarcenter.com/is/image/MMGS7/L78032000002000-00-720x720.jpg',
                'image_path' => '',
                'subcategory_id' => 4,  
                'hasStock' => true, 
            ],
            /* ---------- */
            [
                'name' => 'Fender Player Jazz Bass Plus Top Limited-Edition',
                'price' => '75000',
                'image_link' => 'https://media.guitarcenter.com/is/image/MMGS7/L27717000001000-00-720x720.jpg',
                'image_path' => '',
                'subcategory_id' => 5,  
                'hasStock' => true, 
            ],
            [
                'name' => 'Ibanez AEB5E Acoustic-Electric Bass Black',
                'price' => '61000',
                'image_link' => 'https://media.guitarcenter.com/is/image/MMGS7/620445000001000-00-720x720.jpg',
                'image_path' => '',
                'subcategory_id' => 5,  
                'hasStock' => true, 
            ],
            [
                'name' => 'Mitchell EZB Acoustic-Electric Bass Black',
                'price' => '56500',
                'image_link' => 'https://media.guitarcenter.com/is/image/MMGS7/L54665000003000-00-720x720.jpg',
                'image_path' => '',
                'subcategory_id' => 5,  
                'hasStock' => true, 
            ],
            /* ---------- */
            [
                'name' => 'Marshall DSL40CR 40W 1x12 Tube Guitar Amp',
                'price' => '240000',
                'image_link' => 'https://media.guitarcenter.com/is/image/MMGS7/K64638000000000-00-720x720.jpg',
                'image_path' => '',
                'subcategory_id' => 6,  
                'hasStock' => true, 
            ],
            [
                'name' => 'BOSS Katana-50 MkII 50W 1x12 Guitar Combo Amp',
                'price' => '61000',
                'image_link' => 'https://media.guitarcenter.com/is/image/MMGS7/L68667000000000-00-720x720.jpg',
                'image_path' => '',
                'subcategory_id' => 6,  
                'hasStock' => true, 
            ],
            [
                'name' => 'Fender Vintage Reissue 65 Deluxe Reverb Amp',
                'price' => '360000',
                'image_link' => 'https://media.guitarcenter.com/is/image/MMGS7/480507000001000-00-720x720.jpg',
                'image_path' => '',
                'subcategory_id' => 6,  
                'hasStock' => true, 
            ],
            /* ---------- */
            [
                'name' => 'Fender Rumble 40 1x10 40W Bass Combo Amp',
                'price' => '52000',
                'image_link' => 'https://media.guitarcenter.com/is/image/MMGS7/J06161000000000-00-720x720.jpg',
                'image_path' => '',
                'subcategory_id' => 7,  
                'hasStock' => true, 
            ],
            [
                'name' => 'Peavey MAX 100 100W 1x10 Bass Combo Amp',
                'price' => '68000',
                'image_link' => 'https://media.guitarcenter.com/is/image/MMGS7/L19565000001000-00-720x720.jpg',
                'image_path' => '',
                'subcategory_id' => 7,  
                'hasStock' => true, 
            ],
            [
                'name' => 'Fender Rumble 100 1x12 100W Bass Combo Amp',
                'price' => '75000',
                'image_link' => 'https://media.guitarcenter.com/is/image/MMGS7/J06156000000000-00-720x720.jpg',
                'image_path' => '',
                'subcategory_id' => 7,  
                'hasStock' => true, 
            ],
            /* ---------- */
            [
                'name' => 'BOSS DS-1 Distortion Pedal',
                'price' => '15000',
                'image_link' => 'https://media.guitarcenter.com/is/image/MMGS7/151258000000000-00-720x720.jpg',
                'image_path' => '',
                'subcategory_id' => 8,  
                'hasStock' => true, 
            ],
            [
                'name' => 'Dunlop Original Cry Baby Wah Pedal',
                'price' => '22500',
                'image_link' => 'https://media.guitarcenter.com/is/image/MMGS7/151000000000000-00-720x720.jpg',
                'image_path' => '',
                'subcategory_id' => 8,  
                'hasStock' => true, 
            ],
            [
                'name' => 'Line 6 Helix Multi-Effects Guitar Pedal',
                'price' => '380000',
                'image_link' => 'https://media.guitarcenter.com/is/image/MMGS7/J23118000000000-00-720x720.jpg',
                'image_path' => '',
                'subcategory_id' => 8,  
                'hasStock' => true, 
            ],
        ];

        DB::table('product')->insert($data);
    }
}