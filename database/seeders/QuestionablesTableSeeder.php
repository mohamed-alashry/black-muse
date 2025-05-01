<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class QuestionablesTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('questionables')->delete();
        
        \DB::table('questionables')->insert(array (
            0 => 
            array (
                'id' => 1,
                'question_id' => 1,
                'questionable_type' => 'App\\Models\\Service',
                'questionable_id' => 1,
                'is_required' => 1,
                'created_at' => '2025-04-28 10:55:28',
                'updated_at' => '2025-04-28 10:55:28',
            ),
            1 => 
            array (
                'id' => 2,
                'question_id' => 2,
                'questionable_type' => 'App\\Models\\Service',
                'questionable_id' => 1,
                'is_required' => 1,
                'created_at' => '2025-04-28 10:57:32',
                'updated_at' => '2025-04-28 10:57:32',
            ),
            2 => 
            array (
                'id' => 3,
                'question_id' => 3,
                'questionable_type' => 'App\\Models\\Service',
                'questionable_id' => 1,
                'is_required' => 1,
                'created_at' => '2025-04-28 10:58:15',
                'updated_at' => '2025-04-28 10:58:15',
            ),
            3 => 
            array (
                'id' => 4,
                'question_id' => 4,
                'questionable_type' => 'App\\Models\\Service',
                'questionable_id' => 1,
                'is_required' => 1,
                'created_at' => '2025-04-28 11:00:09',
                'updated_at' => '2025-04-28 11:01:28',
            ),
            4 => 
            array (
                'id' => 5,
                'question_id' => 5,
                'questionable_type' => 'App\\Models\\Service',
                'questionable_id' => 1,
                'is_required' => 1,
                'created_at' => '2025-04-28 11:01:19',
                'updated_at' => '2025-04-28 11:01:19',
            ),
            5 => 
            array (
                'id' => 6,
                'question_id' => 1,
                'questionable_type' => 'App\\Models\\Service',
                'questionable_id' => 2,
                'is_required' => 1,
                'created_at' => '2025-04-28 11:05:03',
                'updated_at' => '2025-04-28 11:05:03',
            ),
            6 => 
            array (
                'id' => 7,
                'question_id' => 2,
                'questionable_type' => 'App\\Models\\Service',
                'questionable_id' => 2,
                'is_required' => 1,
                'created_at' => '2025-04-28 11:05:03',
                'updated_at' => '2025-04-28 11:05:03',
            ),
            7 => 
            array (
                'id' => 8,
                'question_id' => 3,
                'questionable_type' => 'App\\Models\\Service',
                'questionable_id' => 2,
                'is_required' => 1,
                'created_at' => '2025-04-28 11:05:03',
                'updated_at' => '2025-04-28 11:05:03',
            ),
            8 => 
            array (
                'id' => 9,
                'question_id' => 4,
                'questionable_type' => 'App\\Models\\Service',
                'questionable_id' => 2,
                'is_required' => 1,
                'created_at' => '2025-04-28 11:05:03',
                'updated_at' => '2025-04-28 11:05:03',
            ),
            9 => 
            array (
                'id' => 10,
                'question_id' => 5,
                'questionable_type' => 'App\\Models\\Service',
                'questionable_id' => 2,
                'is_required' => 1,
                'created_at' => '2025-04-28 11:05:03',
                'updated_at' => '2025-04-28 11:05:03',
            ),
            10 => 
            array (
                'id' => 11,
                'question_id' => 6,
                'questionable_type' => 'App\\Models\\Service',
                'questionable_id' => 2,
                'is_required' => 1,
                'created_at' => '2025-04-28 11:06:54',
                'updated_at' => '2025-04-28 11:06:54',
            ),
            11 => 
            array (
                'id' => 12,
                'question_id' => 7,
                'questionable_type' => 'App\\Models\\Service',
                'questionable_id' => 2,
                'is_required' => 1,
                'created_at' => '2025-04-28 11:08:40',
                'updated_at' => '2025-04-28 11:08:40',
            ),
            12 => 
            array (
                'id' => 13,
                'question_id' => 8,
                'questionable_type' => 'App\\Models\\Service',
                'questionable_id' => 2,
                'is_required' => 1,
                'created_at' => '2025-04-28 11:08:55',
                'updated_at' => '2025-04-28 11:08:55',
            ),
            13 => 
            array (
                'id' => 14,
                'question_id' => 1,
                'questionable_type' => 'App\\Models\\Service',
                'questionable_id' => 3,
                'is_required' => 1,
                'created_at' => '2025-04-28 11:17:47',
                'updated_at' => '2025-04-28 11:17:47',
            ),
            14 => 
            array (
                'id' => 15,
                'question_id' => 6,
                'questionable_type' => 'App\\Models\\Service',
                'questionable_id' => 3,
                'is_required' => 1,
                'created_at' => '2025-04-28 11:17:47',
                'updated_at' => '2025-04-28 11:17:47',
            ),
            15 => 
            array (
                'id' => 16,
                'question_id' => 9,
                'questionable_type' => 'App\\Models\\Service',
                'questionable_id' => 3,
                'is_required' => 1,
                'created_at' => '2025-04-28 11:18:04',
                'updated_at' => '2025-04-28 11:18:04',
            ),
            16 => 
            array (
                'id' => 17,
                'question_id' => 10,
                'questionable_type' => 'App\\Models\\Service',
                'questionable_id' => 3,
                'is_required' => 1,
                'created_at' => '2025-04-28 11:18:19',
                'updated_at' => '2025-04-28 11:18:19',
            ),
            17 => 
            array (
                'id' => 18,
                'question_id' => 11,
                'questionable_type' => 'App\\Models\\Service',
                'questionable_id' => 3,
                'is_required' => 0,
                'created_at' => '2025-04-28 11:19:14',
                'updated_at' => '2025-04-28 11:19:14',
            ),
            18 => 
            array (
                'id' => 19,
                'question_id' => 6,
                'questionable_type' => 'App\\Models\\Service',
                'questionable_id' => 4,
                'is_required' => 1,
                'created_at' => '2025-04-28 11:20:12',
                'updated_at' => '2025-04-28 11:20:12',
            ),
            19 => 
            array (
                'id' => 20,
                'question_id' => 9,
                'questionable_type' => 'App\\Models\\Service',
                'questionable_id' => 4,
                'is_required' => 1,
                'created_at' => '2025-04-28 11:20:12',
                'updated_at' => '2025-04-28 11:20:12',
            ),
            20 => 
            array (
                'id' => 21,
                'question_id' => 10,
                'questionable_type' => 'App\\Models\\Service',
                'questionable_id' => 4,
                'is_required' => 1,
                'created_at' => '2025-04-28 11:20:12',
                'updated_at' => '2025-04-28 11:20:12',
            ),
            21 => 
            array (
                'id' => 22,
                'question_id' => 14,
                'questionable_type' => 'App\\Models\\Service',
                'questionable_id' => 1,
                'is_required' => 1,
                'created_at' => '2025-05-01 20:23:41',
                'updated_at' => '2025-05-01 20:24:05',
            ),
        ));
        
        
    }
}