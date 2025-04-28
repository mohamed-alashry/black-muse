<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class QuestionOptionsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('question_options')->delete();
        
        \DB::table('question_options')->insert(array (
            0 => 
            array (
                'id' => 1,
                'text' => '{"en": "30 * 22 CM"}',
                'question_id' => 2,
                'sort' => 1,
                'created_at' => '2025-04-28 10:57:32',
                'updated_at' => '2025-04-28 10:57:32',
            ),
            1 => 
            array (
                'id' => 2,
                'text' => '{"en": "20 * 40 CM"}',
                'question_id' => 2,
                'sort' => 2,
                'created_at' => '2025-04-28 10:57:32',
                'updated_at' => '2025-04-28 10:57:32',
            ),
            2 => 
            array (
                'id' => 3,
                'text' => '{"en": "38 * 25 CM"}',
                'question_id' => 2,
                'sort' => 3,
                'created_at' => '2025-04-28 10:57:32',
                'updated_at' => '2025-04-28 10:57:32',
            ),
            3 => 
            array (
                'id' => 4,
                'text' => '{"en": "30 * 45 CM"}',
                'question_id' => 2,
                'sort' => 4,
                'created_at' => '2025-04-28 10:57:32',
                'updated_at' => '2025-04-28 10:57:32',
            ),
            4 => 
            array (
                'id' => 5,
                'text' => '{"en": "50 * 25 CM"}',
                'question_id' => 2,
                'sort' => 5,
                'created_at' => '2025-04-28 10:57:32',
                'updated_at' => '2025-04-28 10:57:32',
            ),
            5 => 
            array (
                'id' => 6,
                'text' => '{"en": "60 * 30 CM"}',
                'question_id' => 2,
                'sort' => 6,
                'created_at' => '2025-04-28 10:57:32',
                'updated_at' => '2025-04-28 10:57:32',
            ),
            6 => 
            array (
                'id' => 7,
                'text' => '{"en": "30 * 80 CM"}',
                'question_id' => 2,
                'sort' => 7,
                'created_at' => '2025-04-28 10:57:32',
                'updated_at' => '2025-04-28 10:57:32',
            ),
            7 => 
            array (
                'id' => 8,
                'text' => '{"en": "10"}',
                'question_id' => 3,
                'sort' => 1,
                'created_at' => '2025-04-28 10:58:15',
                'updated_at' => '2025-04-28 10:58:15',
            ),
            8 => 
            array (
                'id' => 9,
                'text' => '{"en": "25"}',
                'question_id' => 3,
                'sort' => 2,
                'created_at' => '2025-04-28 10:58:15',
                'updated_at' => '2025-04-28 10:58:15',
            ),
            9 => 
            array (
                'id' => 10,
                'text' => '{"en": "#f20505"}',
                'question_id' => 4,
                'sort' => 1,
                'created_at' => '2025-04-28 11:00:09',
                'updated_at' => '2025-04-28 11:00:09',
            ),
            10 => 
            array (
                'id' => 11,
                'text' => '{"en": "#0d0000"}',
                'question_id' => 4,
                'sort' => 2,
                'created_at' => '2025-04-28 11:00:09',
                'updated_at' => '2025-04-28 11:00:09',
            ),
            11 => 
            array (
                'id' => 12,
                'text' => '{"en": "#40fa56"}',
                'question_id' => 4,
                'sort' => 3,
                'created_at' => '2025-04-28 11:00:09',
                'updated_at' => '2025-04-28 11:00:09',
            ),
            12 => 
            array (
                'id' => 13,
                'text' => '{"en": "#00beff"}',
                'question_id' => 4,
                'sort' => 4,
                'created_at' => '2025-04-28 11:00:09',
                'updated_at' => '2025-04-28 11:00:09',
            ),
            13 => 
            array (
                'id' => 14,
                'text' => '{"en": "#9e00ed"}',
                'question_id' => 4,
                'sort' => 5,
                'created_at' => '2025-04-28 11:00:09',
                'updated_at' => '2025-04-28 11:00:09',
            ),
            14 => 
            array (
                'id' => 15,
                'text' => '{"en": "Plastice"}',
                'question_id' => 5,
                'sort' => 1,
                'created_at' => '2025-04-28 11:01:19',
                'updated_at' => '2025-04-28 11:01:19',
            ),
            15 => 
            array (
                'id' => 16,
                'text' => '{"en": "Wood"}',
                'question_id' => 5,
                'sort' => 2,
                'created_at' => '2025-04-28 11:01:19',
                'updated_at' => '2025-04-28 11:01:19',
            ),
            16 => 
            array (
                'id' => 17,
                'text' => '{"en": "Leather"}',
                'question_id' => 5,
                'sort' => 3,
                'created_at' => '2025-04-28 11:01:19',
                'updated_at' => '2025-04-28 11:01:19',
            ),
            17 => 
            array (
                'id' => 18,
                'text' => '{"en": "Fabric"}',
                'question_id' => 5,
                'sort' => 4,
                'created_at' => '2025-04-28 11:01:19',
                'updated_at' => '2025-04-28 11:01:19',
            ),
            18 => 
            array (
                'id' => 19,
                'text' => '{"en": "photoshop only"}',
                'question_id' => 7,
                'sort' => 1,
                'created_at' => '2025-04-28 11:08:40',
                'updated_at' => '2025-04-28 11:08:40',
            ),
            19 => 
            array (
                'id' => 20,
                'text' => '{"en": "photoshop and design"}',
                'question_id' => 7,
                'sort' => 2,
                'created_at' => '2025-04-28 11:08:40',
                'updated_at' => '2025-04-28 11:08:40',
            ),
            20 => 
            array (
                'id' => 21,
                'text' => '{"en": "design only"}',
                'question_id' => 7,
                'sort' => 3,
                'created_at' => '2025-04-28 11:08:40',
                'updated_at' => '2025-04-28 11:08:40',
            ),
            21 => 
            array (
                'id' => 22,
                'text' => '{"en": "printing only"}',
                'question_id' => 7,
                'sort' => 4,
                'created_at' => '2025-04-28 11:08:40',
                'updated_at' => '2025-04-28 11:08:40',
            ),
            22 => 
            array (
                'id' => 23,
                'text' => '{"en": "yes"}',
                'question_id' => 11,
                'sort' => 1,
                'created_at' => '2025-04-28 11:19:14',
                'updated_at' => '2025-04-28 11:19:14',
            ),
            23 => 
            array (
                'id' => 24,
                'text' => '{"en": "no"}',
                'question_id' => 11,
                'sort' => 2,
                'created_at' => '2025-04-28 11:19:14',
                'updated_at' => '2025-04-28 11:19:14',
            ),
        ));
        
        
    }
}