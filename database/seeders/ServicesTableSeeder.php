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
                'name' => '{"en": "Bindery"}',
                'category' => 'bindery',
                'photo' => '01JSQAPVN425RER85W20QAH6GN.jpg',
                'description' => NULL,
                'status' => 'active',
                'created_at' => '2025-04-25 20:37:30',
                'updated_at' => '2025-04-25 20:37:30',
            ),
            1 => 
            array (
                'id' => 2,
                'name' => '{"en": "Lab"}',
                'category' => 'lab',
                'photo' => '01JSQAYFS08PYVKQGFFYE2XN4Y.jpg',
                'description' => NULL,
                'status' => 'active',
                'created_at' => '2025-04-25 20:41:40',
                'updated_at' => '2025-04-25 20:41:40',
            ),
            2 => 
            array (
                'id' => 3,
                'name' => '{"en": "Weddings"}',
                'category' => 'photography',
                'photo' => '01JSQAPVN425RER85W20QAH6GN.jpg',
                'description' => NULL,
                'status' => 'active',
                'created_at' => '2025-04-25 20:45:30',
                'updated_at' => '2025-04-25 20:45:30',
            ),
            3 => 
            array (
                'id' => 4,
                'name' => '{"en": "Party"}',
                'category' => 'photography',
                'photo' => '01JSQAYFS08PYVKQGFFYE2XN4Y.jpg',
                'description' => NULL,
                'status' => 'active',
                'created_at' => '2025-04-25 20:49:40',
                'updated_at' => '2025-04-25 20:49:40',
            ),
        ));
        
        
    }
}