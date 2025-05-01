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
                'text' => '{"en": "Name of the Bride & Groom or client"}',
                'type' => 'text',
                'sort' => 1,
                'created_at' => '2025-04-28 10:55:28',
                'updated_at' => '2025-04-28 10:55:28',
            ),
            1 => 
            array (
                'id' => 2,
                'text' => '{"en": "Album size"}',
                'type' => 'radio',
                'sort' => 1,
                'created_at' => '2025-04-28 10:57:32',
                'updated_at' => '2025-04-28 10:57:32',
            ),
            2 => 
            array (
                'id' => 3,
                'text' => '{"en": "Pages count"}',
                'type' => 'select',
                'sort' => 1,
                'created_at' => '2025-04-28 10:58:15',
                'updated_at' => '2025-04-28 10:58:15',
            ),
            3 => 
            array (
                'id' => 4,
                'text' => '{"en": "Color"}',
                'type' => 'color-select',
                'sort' => 1,
                'created_at' => '2025-04-28 11:00:09',
                'updated_at' => '2025-04-28 11:01:28',
            ),
            4 => 
            array (
                'id' => 5,
                'text' => '{"en": "Materials"}',
                'type' => 'checkbox',
                'sort' => 1,
                'created_at' => '2025-04-28 11:01:19',
                'updated_at' => '2025-04-28 11:01:19',
            ),
            5 => 
            array (
                'id' => 6,
                'text' => '{"en": "Date"}',
                'type' => 'date',
                'sort' => 1,
                'created_at' => '2025-04-28 11:06:54',
                'updated_at' => '2025-04-28 11:06:54',
            ),
            6 => 
            array (
                'id' => 7,
                'text' => '{"en": "Kind of service"}',
                'type' => 'select',
                'sort' => 1,
                'created_at' => '2025-04-28 11:08:40',
                'updated_at' => '2025-04-28 11:08:40',
            ),
            7 => 
            array (
                'id' => 8,
                'text' => '{"en": "Images"}',
                'type' => 'file-upload',
                'sort' => 1,
                'created_at' => '2025-04-28 11:08:55',
                'updated_at' => '2025-04-28 11:08:55',
            ),
            8 => 
            array (
                'id' => 9,
                'text' => '{"en": "Location"}',
                'type' => 'text',
                'sort' => 1,
                'created_at' => '2025-04-28 11:18:04',
                'updated_at' => '2025-04-28 11:18:04',
            ),
            9 => 
            array (
                'id' => 10,
                'text' => '{"en": "Time"}',
                'type' => 'text',
                'sort' => 1,
                'created_at' => '2025-04-28 11:18:19',
                'updated_at' => '2025-04-28 11:18:19',
            ),
            10 => 
            array (
                'id' => 11,
                'text' => '{"en": "Separate Hall for Men"}',
                'type' => 'radio',
                'sort' => 1,
                'created_at' => '2025-04-28 11:19:14',
                'updated_at' => '2025-04-28 11:19:14',
            ),
            11 => 
            array (
                'id' => 12,
                'text' => '{"en": "Choose leather material"}',
                'type' => 'image-select',
                'sort' => 1,
                'created_at' => '2025-05-01 20:22:13',
                'updated_at' => '2025-05-01 20:22:13',
            ),
            12 => 
            array (
                'id' => 13,
                'text' => '{"en": "Choose linen material"}',
                'type' => 'image-select',
                'sort' => 1,
                'created_at' => '2025-05-01 20:22:56',
                'updated_at' => '2025-05-01 20:22:56',
            ),
            13 => 
            array (
                'id' => 14,
                'text' => '{"en": "Choose Catalog"}',
                'type' => 'radio',
                'sort' => 1,
                'created_at' => '2025-05-01 20:23:41',
                'updated_at' => '2025-05-01 20:23:41',
            ),
        ));
        
        
    }
}