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
                'label' => '{"en": "30 * 22 CM"}',
                'value' => "30 * 22 CM",
                'question_id' => 2,
                'sort' => 1,
                'created_at' => '2025-04-28 10:57:32',
                'updated_at' => '2025-04-28 10:57:32',
            ),
            1 =>
            array (
                'id' => 2,
                'label' => '{"en": "20 * 40 CM"}',
                'value' => "20 * 40 CM",
                'question_id' => 2,
                'sort' => 2,
                'created_at' => '2025-04-28 10:57:32',
                'updated_at' => '2025-04-28 10:57:32',
            ),
            2 =>
            array (
                'id' => 3,
                'label' => '{"en": "38 * 25 CM"}',
                'value' => "38 * 25 CM",
                'question_id' => 2,
                'sort' => 3,
                'created_at' => '2025-04-28 10:57:32',
                'updated_at' => '2025-04-28 10:57:32',
            ),
            3 =>
            array (
                'id' => 4,
                'label' => '{"en": "30 * 45 CM"}',
                'value' => "30 * 45 CM",
                'question_id' => 2,
                'sort' => 4,
                'created_at' => '2025-04-28 10:57:32',
                'updated_at' => '2025-04-28 10:57:32',
            ),
            4 =>
            array (
                'id' => 5,
                'label' => '{"en": "50 * 25 CM"}',
                'value' => "50 * 25 CM",
                'question_id' => 2,
                'sort' => 5,
                'created_at' => '2025-04-28 10:57:32',
                'updated_at' => '2025-04-28 10:57:32',
            ),
            5 =>
            array (
                'id' => 6,
                'label' => '{"en": "60 * 30 CM"}',
                'value' => "60 * 30 CM",
                'question_id' => 2,
                'sort' => 6,
                'created_at' => '2025-04-28 10:57:32',
                'updated_at' => '2025-04-28 10:57:32',
            ),
            6 =>
            array (
                'id' => 7,
                'label' => '{"en": "30 * 80 CM"}',
                'value' => "30 * 80 CM",
                'question_id' => 2,
                'sort' => 7,
                'created_at' => '2025-04-28 10:57:32',
                'updated_at' => '2025-04-28 10:57:32',
            ),
            7 =>
            array (
                'id' => 8,
                'label' => '{"en": "10"}',
                'value' => "10",
                'question_id' => 3,
                'sort' => 1,
                'created_at' => '2025-04-28 10:58:15',
                'updated_at' => '2025-04-28 10:58:15',
            ),
            8 =>
            array (
                'id' => 9,
                'label' => '{"en": "25"}',
                'value' => "25",
                'question_id' => 3,
                'sort' => 2,
                'created_at' => '2025-04-28 10:58:15',
                'updated_at' => '2025-04-28 10:58:15',
            ),
            9 =>
            array (
                'id' => 10,
                'label' => '{"en": "#f20505"}',
                'value' => "#f20505",
                'question_id' => 4,
                'sort' => 1,
                'created_at' => '2025-04-28 11:00:09',
                'updated_at' => '2025-04-28 11:00:09',
            ),
            10 =>
            array (
                'id' => 11,
                'label' => '{"en": "#0d0000"}',
                'value' => "#0d0000",
                'question_id' => 4,
                'sort' => 2,
                'created_at' => '2025-04-28 11:00:09',
                'updated_at' => '2025-04-28 11:00:09',
            ),
            11 =>
            array (
                'id' => 12,
                'label' => '{"en": "#40fa56"}',
                'value' => "#40fa56",
                'question_id' => 4,
                'sort' => 3,
                'created_at' => '2025-04-28 11:00:09',
                'updated_at' => '2025-04-28 11:00:09',
            ),
            12 =>
            array (
                'id' => 13,
                'label' => '{"en": "#00beff"}',
                'value' => "#00beff",
                'question_id' => 4,
                'sort' => 4,
                'created_at' => '2025-04-28 11:00:09',
                'updated_at' => '2025-04-28 11:00:09',
            ),
            13 =>
            array (
                'id' => 14,
                'label' => '{"en": "#9e00ed"}',
                'value' => "#9e00ed",
                'question_id' => 4,
                'sort' => 5,
                'created_at' => '2025-04-28 11:00:09',
                'updated_at' => '2025-04-28 11:00:09',
            ),
            14 =>
            array (
                'id' => 15,
                'label' => '{"en": "Plastice"}',
                'value' => "Plastice",
                'question_id' => 5,
                'sort' => 1,
                'created_at' => '2025-04-28 11:01:19',
                'updated_at' => '2025-04-28 11:01:19',
            ),
            15 =>
            array (
                'id' => 16,
                'label' => '{"en": "Wood"}',
                'value' => "Wood",
                'question_id' => 5,
                'sort' => 2,
                'created_at' => '2025-04-28 11:01:19',
                'updated_at' => '2025-04-28 11:01:19',
            ),
            16 =>
            array (
                'id' => 17,
                'label' => '{"en": "Leather"}',
                'value' => "Leather",
                'question_id' => 5,
                'sort' => 3,
                'created_at' => '2025-04-28 11:01:19',
                'updated_at' => '2025-04-28 11:01:19',
            ),
            17 =>
            array (
                'id' => 18,
                'label' => '{"en": "Fabric"}',
                'value' => "Fabric",
                'question_id' => 5,
                'sort' => 4,
                'created_at' => '2025-04-28 11:01:19',
                'updated_at' => '2025-04-28 11:01:19',
            ),
            18 =>
            array (
                'id' => 19,
                'label' => '{"en": "photoshop only"}',
                'value' => "photoshop only",
                'question_id' => 7,
                'sort' => 1,
                'created_at' => '2025-04-28 11:08:40',
                'updated_at' => '2025-04-28 11:08:40',
            ),
            19 =>
            array (
                'id' => 20,
                'label' => '{"en": "photoshop and design"}',
                'value' => "photoshop and design",
                'question_id' => 7,
                'sort' => 2,
                'created_at' => '2025-04-28 11:08:40',
                'updated_at' => '2025-04-28 11:08:40',
            ),
            20 =>
            array (
                'id' => 21,
                'label' => '{"en": "design only"}',
                'value' => "design only",
                'question_id' => 7,
                'sort' => 3,
                'created_at' => '2025-04-28 11:08:40',
                'updated_at' => '2025-04-28 11:08:40',
            ),
            21 =>
            array (
                'id' => 22,
                'label' => '{"en": "printing only"}',
                'value' => "printing only",
                'question_id' => 7,
                'sort' => 4,
                'created_at' => '2025-04-28 11:08:40',
                'updated_at' => '2025-04-28 11:08:40',
            ),
            22 =>
            array (
                'id' => 23,
                'label' => '{"en": "yes"}',
                'value' => "yes",
                'question_id' => 11,
                'sort' => 1,
                'created_at' => '2025-04-28 11:19:14',
                'updated_at' => '2025-04-28 11:19:14',
            ),
            23 =>
            array (
                'id' => 24,
                'label' => '{"en": "no"}',
                'value' => "no",
                'question_id' => 11,
                'sort' => 2,
                'created_at' => '2025-04-28 11:19:14',
                'updated_at' => '2025-04-28 11:19:14',
            ),
        ));


    }
}
