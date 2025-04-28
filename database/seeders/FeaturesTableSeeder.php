<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class FeaturesTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('features')->delete();
        
        \DB::table('features')->insert(array (
            0 => 
            array (
                'id' => 1,
                'name' => '{"en": "one photographer"}',
                'price' => '500.00',
                'status' => 'active',
                'created_at' => '2025-04-25 20:43:00',
                'updated_at' => '2025-04-25 20:43:00',
            ),
            1 => 
            array (
                'id' => 2,
                'name' => '{"en": "Prints"}',
                'price' => '200.00',
                'status' => 'active',
                'created_at' => '2025-04-25 20:43:53',
                'updated_at' => '2025-04-25 20:43:53',
            ),
            2 => 
            array (
                'id' => 3,
                'name' => '{"en": "video"}',
                'price' => '300.00',
                'status' => 'active',
                'created_at' => '2025-04-25 20:44:05',
                'updated_at' => '2025-04-25 20:44:05',
            ),
            3 => 
            array (
                'id' => 4,
                'name' => '{"en": "drone"}',
                'price' => '300.00',
                'status' => 'active',
                'created_at' => '2025-04-25 20:44:20',
                'updated_at' => '2025-04-25 20:44:20',
            ),
            4 => 
            array (
                'id' => 5,
                'name' => '{"en": "Extra photographer"}',
                'price' => '500.00',
                'status' => 'active',
                'created_at' => '2025-04-25 20:44:34',
                'updated_at' => '2025-04-25 20:44:34',
            ),
            5 => 
            array (
                'id' => 6,
                'name' => '{"en": "20 * 30 without carvings"}',
                'price' => '200.00',
                'status' => 'active',
                'created_at' => '2025-04-28 11:24:08',
                'updated_at' => '2025-04-28 11:24:08',
            ),
            6 => 
            array (
                'id' => 7,
                'name' => '{"en": "20 * 30 with carvings"}',
                'price' => '300.00',
                'status' => 'active',
                'created_at' => '2025-04-28 11:24:23',
                'updated_at' => '2025-04-28 11:24:23',
            ),
            7 => 
            array (
                'id' => 8,
                'name' => '{"en": "USB box without carvings"}',
                'price' => '50.00',
                'status' => 'active',
                'created_at' => '2025-04-28 11:25:29',
                'updated_at' => '2025-04-28 11:25:29',
            ),
            8 => 
            array (
                'id' => 9,
                'name' => '{"en": "USB box with carvings"}',
                'price' => '80.00',
                'status' => 'active',
                'created_at' => '2025-04-28 11:26:05',
                'updated_at' => '2025-04-28 11:26:05',
            ),
            9 => 
            array (
                'id' => 10,
                'name' => '{"en": "Photos box without carvings"}',
                'price' => '60.00',
                'status' => 'active',
                'created_at' => '2025-04-28 11:26:35',
                'updated_at' => '2025-04-28 11:26:35',
            ),
            10 => 
            array (
                'id' => 11,
                'name' => '{"en": "Photos box with carvings"}',
                'price' => '90.00',
                'status' => 'active',
                'created_at' => '2025-04-28 11:26:48',
                'updated_at' => '2025-04-28 11:26:48',
            ),
            11 => 
            array (
                'id' => 12,
                'name' => '{"en": "10 Pages"}',
                'price' => '600.00',
                'status' => 'active',
                'created_at' => '2025-04-28 11:28:19',
                'updated_at' => '2025-04-28 11:28:19',
            ),
            12 => 
            array (
                'id' => 13,
                'name' => '{"en": "15 Pages"}',
                'price' => '800.00',
                'status' => 'active',
                'created_at' => '2025-04-28 11:28:42',
                'updated_at' => '2025-04-28 11:28:42',
            ),
            13 => 
            array (
                'id' => 14,
                'name' => '{"en": "20 Pages"}',
                'price' => '1000.00',
                'status' => 'active',
                'created_at' => '2025-04-28 11:28:53',
                'updated_at' => '2025-04-28 11:28:53',
            ),
        ));
        
        
    }
}