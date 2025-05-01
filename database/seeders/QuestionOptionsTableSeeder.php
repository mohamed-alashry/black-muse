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
                'label' => '30 * 22 CM',
                'question_id' => 2,
                'value' => '30 * 22 CM',
                'sort' => 1,
                'created_at' => '2025-04-28 10:57:32',
                'updated_at' => '2025-04-28 10:57:32',
            ),
            1 => 
            array (
                'id' => 2,
                'label' => '20 * 40 CM',
                'question_id' => 2,
                'value' => '20 * 40 CM',
                'sort' => 2,
                'created_at' => '2025-04-28 10:57:32',
                'updated_at' => '2025-04-28 10:57:32',
            ),
            2 => 
            array (
                'id' => 3,
                'label' => '38 * 25 CM',
                'question_id' => 2,
                'value' => '38 * 25 CM',
                'sort' => 3,
                'created_at' => '2025-04-28 10:57:32',
                'updated_at' => '2025-04-28 10:57:32',
            ),
            3 => 
            array (
                'id' => 4,
                'label' => '30 * 45 CM',
                'question_id' => 2,
                'value' => '30 * 45 CM',
                'sort' => 4,
                'created_at' => '2025-04-28 10:57:32',
                'updated_at' => '2025-04-28 10:57:32',
            ),
            4 => 
            array (
                'id' => 5,
                'label' => '50 * 25 CM',
                'question_id' => 2,
                'value' => '50 * 25 CM',
                'sort' => 5,
                'created_at' => '2025-04-28 10:57:32',
                'updated_at' => '2025-04-28 10:57:32',
            ),
            5 => 
            array (
                'id' => 6,
                'label' => '60 * 30 CM',
                'question_id' => 2,
                'value' => '60 * 30 CM',
                'sort' => 6,
                'created_at' => '2025-04-28 10:57:32',
                'updated_at' => '2025-04-28 10:57:32',
            ),
            6 => 
            array (
                'id' => 7,
                'label' => '30 * 80 CM',
                'question_id' => 2,
                'value' => '30 * 80 CM',
                'sort' => 7,
                'created_at' => '2025-04-28 10:57:32',
                'updated_at' => '2025-04-28 10:57:32',
            ),
            7 => 
            array (
                'id' => 8,
                'label' => '10',
                'question_id' => 3,
                'value' => '10',
                'sort' => 1,
                'created_at' => '2025-04-28 10:58:15',
                'updated_at' => '2025-04-28 10:58:15',
            ),
            8 => 
            array (
                'id' => 9,
                'label' => '25',
                'question_id' => 3,
                'value' => '25',
                'sort' => 2,
                'created_at' => '2025-04-28 10:58:15',
                'updated_at' => '2025-04-28 10:58:15',
            ),
            9 => 
            array (
                'id' => 10,
                'label' => '#f20505',
                'question_id' => 4,
                'value' => '#f20505',
                'sort' => 1,
                'created_at' => '2025-04-28 11:00:09',
                'updated_at' => '2025-04-28 11:00:09',
            ),
            10 => 
            array (
                'id' => 11,
                'label' => '#0d0000',
                'question_id' => 4,
                'value' => '#0d0000',
                'sort' => 2,
                'created_at' => '2025-04-28 11:00:09',
                'updated_at' => '2025-04-28 11:00:09',
            ),
            11 => 
            array (
                'id' => 12,
                'label' => '#40fa56',
                'question_id' => 4,
                'value' => '#40fa56',
                'sort' => 3,
                'created_at' => '2025-04-28 11:00:09',
                'updated_at' => '2025-04-28 11:00:09',
            ),
            12 => 
            array (
                'id' => 13,
                'label' => '#00beff',
                'question_id' => 4,
                'value' => '#00beff',
                'sort' => 4,
                'created_at' => '2025-04-28 11:00:09',
                'updated_at' => '2025-04-28 11:00:09',
            ),
            13 => 
            array (
                'id' => 14,
                'label' => '#9e00ed',
                'question_id' => 4,
                'value' => '#9e00ed',
                'sort' => 5,
                'created_at' => '2025-04-28 11:00:09',
                'updated_at' => '2025-04-28 11:00:09',
            ),
            14 => 
            array (
                'id' => 15,
                'label' => 'Plastice',
                'question_id' => 5,
                'value' => 'Plastice',
                'sort' => 1,
                'created_at' => '2025-04-28 11:01:19',
                'updated_at' => '2025-04-28 11:01:19',
            ),
            15 => 
            array (
                'id' => 16,
                'label' => 'Wood',
                'question_id' => 5,
                'value' => 'Wood',
                'sort' => 2,
                'created_at' => '2025-04-28 11:01:19',
                'updated_at' => '2025-04-28 11:01:19',
            ),
            16 => 
            array (
                'id' => 17,
                'label' => 'Leather',
                'question_id' => 5,
                'value' => 'Leather',
                'sort' => 3,
                'created_at' => '2025-04-28 11:01:19',
                'updated_at' => '2025-04-28 11:01:19',
            ),
            17 => 
            array (
                'id' => 18,
                'label' => 'Fabric',
                'question_id' => 5,
                'value' => 'Fabric',
                'sort' => 4,
                'created_at' => '2025-04-28 11:01:19',
                'updated_at' => '2025-04-28 11:01:19',
            ),
            18 => 
            array (
                'id' => 19,
                'label' => 'photoshop only',
                'question_id' => 7,
                'value' => 'photoshop only',
                'sort' => 1,
                'created_at' => '2025-04-28 11:08:40',
                'updated_at' => '2025-04-28 11:08:40',
            ),
            19 => 
            array (
                'id' => 20,
                'label' => 'photoshop and design',
                'question_id' => 7,
                'value' => 'photoshop and design',
                'sort' => 2,
                'created_at' => '2025-04-28 11:08:40',
                'updated_at' => '2025-04-28 11:08:40',
            ),
            20 => 
            array (
                'id' => 21,
                'label' => 'design only',
                'question_id' => 7,
                'value' => 'design only',
                'sort' => 3,
                'created_at' => '2025-04-28 11:08:40',
                'updated_at' => '2025-04-28 11:08:40',
            ),
            21 => 
            array (
                'id' => 22,
                'label' => 'printing only',
                'question_id' => 7,
                'value' => 'printing only',
                'sort' => 4,
                'created_at' => '2025-04-28 11:08:40',
                'updated_at' => '2025-04-28 11:08:40',
            ),
            22 => 
            array (
                'id' => 23,
                'label' => 'yes',
                'question_id' => 11,
                'value' => 'yes',
                'sort' => 1,
                'created_at' => '2025-04-28 11:19:14',
                'updated_at' => '2025-04-28 11:19:14',
            ),
            23 => 
            array (
                'id' => 24,
                'label' => 'no',
                'question_id' => 11,
                'value' => 'no',
                'sort' => 2,
                'created_at' => '2025-04-28 11:19:14',
                'updated_at' => '2025-04-28 11:19:14',
            ),
            24 => 
            array (
                'id' => 25,
                'label' => '01JT6R75WR9QNBRY6HXEMJ760K.png',
                'question_id' => 12,
                'value' => '1',
                'sort' => 1,
                'created_at' => '2025-05-01 20:22:13',
                'updated_at' => '2025-05-01 20:22:13',
            ),
            25 => 
            array (
                'id' => 26,
                'label' => '01JT6R75X2XD6KNQVY827EBVFJ.png',
                'question_id' => 12,
                'value' => '2',
                'sort' => 2,
                'created_at' => '2025-05-01 20:22:13',
                'updated_at' => '2025-05-01 20:22:13',
            ),
            26 => 
            array (
                'id' => 27,
                'label' => '01JT6R75X4NX0V50F8QM45P28Q.png',
                'question_id' => 12,
                'value' => '3',
                'sort' => 3,
                'created_at' => '2025-05-01 20:22:13',
                'updated_at' => '2025-05-01 20:22:13',
            ),
            27 => 
            array (
                'id' => 28,
                'label' => '01JT6R8G46SESZDJPMJJV7C2QG.png',
                'question_id' => 13,
                'value' => '0',
                'sort' => 1,
                'created_at' => '2025-05-01 20:22:56',
                'updated_at' => '2025-05-01 20:22:56',
            ),
            28 => 
            array (
                'id' => 29,
                'label' => '01JT6R8G48TD3G301ZYGHEJB50.png',
                'question_id' => 13,
                'value' => '00',
                'sort' => 2,
                'created_at' => '2025-05-01 20:22:56',
                'updated_at' => '2025-05-01 20:22:56',
            ),
            29 => 
            array (
                'id' => 30,
                'label' => '01JT6R8G497SRZY7ZK07QH3K89.png',
                'question_id' => 13,
                'value' => '000',
                'sort' => 3,
                'created_at' => '2025-05-01 20:22:56',
                'updated_at' => '2025-05-01 20:22:56',
            ),
            30 => 
            array (
                'id' => 31,
                'label' => 'leather',
                'question_id' => 14,
                'value' => 'leather',
                'sort' => 1,
                'created_at' => '2025-05-01 20:23:41',
                'updated_at' => '2025-05-01 20:23:41',
            ),
            31 => 
            array (
                'id' => 32,
                'label' => 'linen',
                'question_id' => 14,
                'value' => 'linen',
                'sort' => 2,
                'created_at' => '2025-05-01 20:23:41',
                'updated_at' => '2025-05-01 20:23:41',
            ),
        ));
        
        
    }
}