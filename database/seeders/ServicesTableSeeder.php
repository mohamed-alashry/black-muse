<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class ServicesTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('services')->delete();
        
        \DB::table('services')->insert(array (
            0 => 
            array (
                'id' => 1,
                'name' => '{"en": "Weddings"}',
                'photo' => '01JSQAPVN425RER85W20QAH6GN.jpg',
                'status' => 'active',
                'created_at' => '2025-04-25 20:37:30',
                'updated_at' => '2025-04-25 20:37:30',
            ),
            1 => 
            array (
                'id' => 2,
                'name' => '{"en": "Party"}',
                'photo' => '01JSQAYFS08PYVKQGFFYE2XN4Y.jpg',
                'status' => 'active',
                'created_at' => '2025-04-25 20:41:40',
                'updated_at' => '2025-04-25 20:41:40',
            ),
        ));
        
        
    }
}