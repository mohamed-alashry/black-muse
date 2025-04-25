<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class QuestionsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('questions')->delete();
        
        \DB::table('questions')->insert(array (
            0 => 
            array (
                'id' => 1,
                'text' => '{"en": "name of the groom"}',
                'type' => 'text',
                'created_at' => '2025-04-25 20:39:31',
                'updated_at' => '2025-04-25 20:39:31',
            ),
            1 => 
            array (
                'id' => 2,
                'text' => '{"en": "name of the bride"}',
                'type' => 'text',
                'created_at' => '2025-04-25 20:39:46',
                'updated_at' => '2025-04-25 20:39:46',
            ),
            2 => 
            array (
                'id' => 3,
                'text' => '{"en": "event time from - to"}',
                'type' => 'text',
                'created_at' => '2025-04-25 20:40:56',
                'updated_at' => '2025-04-25 20:40:56',
            ),
            3 => 
            array (
                'id' => 4,
                'text' => '{"en": "location"}',
                'type' => 'text',
                'created_at' => '2025-04-25 20:41:12',
                'updated_at' => '2025-04-25 20:41:12',
            ),
        ));
        
        
    }
}