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
                'created_at' => '2025-04-25 20:39:31',
                'updated_at' => '2025-04-25 20:39:31',
            ),
            1 => 
            array (
                'id' => 2,
                'question_id' => 2,
                'questionable_type' => 'App\\Models\\Service',
                'questionable_id' => 1,
                'is_required' => 1,
                'created_at' => '2025-04-25 20:39:46',
                'updated_at' => '2025-04-25 20:39:46',
            ),
            2 => 
            array (
                'id' => 3,
                'question_id' => 3,
                'questionable_type' => 'App\\Models\\Service',
                'questionable_id' => 1,
                'is_required' => 1,
                'created_at' => '2025-04-25 20:40:56',
                'updated_at' => '2025-04-25 20:40:56',
            ),
            3 => 
            array (
                'id' => 4,
                'question_id' => 4,
                'questionable_type' => 'App\\Models\\Service',
                'questionable_id' => 1,
                'is_required' => 1,
                'created_at' => '2025-04-25 20:41:12',
                'updated_at' => '2025-04-25 20:41:12',
            ),
            4 => 
            array (
                'id' => 5,
                'question_id' => 3,
                'questionable_type' => 'App\\Models\\Service',
                'questionable_id' => 2,
                'is_required' => 1,
                'created_at' => '2025-04-25 20:41:51',
                'updated_at' => '2025-04-25 20:41:55',
            ),
            5 => 
            array (
                'id' => 6,
                'question_id' => 4,
                'questionable_type' => 'App\\Models\\Service',
                'questionable_id' => 2,
                'is_required' => 1,
                'created_at' => '2025-04-25 20:41:51',
                'updated_at' => '2025-04-25 20:41:56',
            ),
        ));
        
        
    }
}