<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class QuestionDependenciesTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('question_dependencies')->delete();
        
        \DB::table('question_dependencies')->insert(array (
            0 => 
            array (
                'id' => 1,
                'question_option_id' => 31,
                'child_question_id' => 12,
                'sort' => 1,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            1 => 
            array (
                'id' => 2,
                'question_option_id' => 32,
                'child_question_id' => 13,
                'sort' => 1,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
        ));
        
        
    }
}