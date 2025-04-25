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
        ));
        
        
    }
}