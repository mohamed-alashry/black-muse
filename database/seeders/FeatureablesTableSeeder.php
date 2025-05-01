<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class FeatureablesTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('featureables')->delete();
        
        \DB::table('featureables')->insert(array (
            0 => 
            array (
                'id' => 1,
                'feature_id' => 6,
                'featureable_type' => 'App\\Models\\Package',
                'featureable_id' => 1,
                'is_default' => 1,
                'created_at' => '2025-04-28 11:24:08',
                'updated_at' => '2025-05-01 20:24:29',
            ),
            1 => 
            array (
                'id' => 2,
                'feature_id' => 7,
                'featureable_type' => 'App\\Models\\Package',
                'featureable_id' => 1,
                'is_default' => 0,
                'created_at' => '2025-04-28 11:24:23',
                'updated_at' => '2025-04-28 11:24:23',
            ),
            2 => 
            array (
                'id' => 3,
                'feature_id' => 8,
                'featureable_type' => 'App\\Models\\Package',
                'featureable_id' => 1,
                'is_default' => 1,
                'created_at' => '2025-04-28 11:25:29',
                'updated_at' => '2025-05-01 20:24:39',
            ),
            3 => 
            array (
                'id' => 4,
                'feature_id' => 9,
                'featureable_type' => 'App\\Models\\Package',
                'featureable_id' => 1,
                'is_default' => 0,
                'created_at' => '2025-04-28 11:26:05',
                'updated_at' => '2025-04-28 11:26:52',
            ),
            4 => 
            array (
                'id' => 5,
                'feature_id' => 10,
                'featureable_type' => 'App\\Models\\Package',
                'featureable_id' => 1,
                'is_default' => 1,
                'created_at' => '2025-04-28 11:26:35',
                'updated_at' => '2025-05-01 20:24:43',
            ),
            5 => 
            array (
                'id' => 6,
                'feature_id' => 11,
                'featureable_type' => 'App\\Models\\Package',
                'featureable_id' => 1,
                'is_default' => 0,
                'created_at' => '2025-04-28 11:26:48',
                'updated_at' => '2025-04-28 11:26:48',
            ),
            6 => 
            array (
                'id' => 7,
                'feature_id' => 12,
                'featureable_type' => 'App\\Models\\Package',
                'featureable_id' => 2,
                'is_default' => 1,
                'created_at' => '2025-04-28 11:28:19',
                'updated_at' => '2025-05-01 20:25:02',
            ),
            7 => 
            array (
                'id' => 8,
                'feature_id' => 13,
                'featureable_type' => 'App\\Models\\Package',
                'featureable_id' => 2,
                'is_default' => 0,
                'created_at' => '2025-04-28 11:28:42',
                'updated_at' => '2025-04-28 11:28:42',
            ),
            8 => 
            array (
                'id' => 9,
                'feature_id' => 14,
                'featureable_type' => 'App\\Models\\Package',
                'featureable_id' => 2,
                'is_default' => 0,
                'created_at' => '2025-04-28 11:28:53',
                'updated_at' => '2025-04-28 11:28:53',
            ),
            9 => 
            array (
                'id' => 10,
                'feature_id' => 1,
                'featureable_type' => 'App\\Models\\Package',
                'featureable_id' => 3,
                'is_default' => 1,
                'created_at' => '2025-04-28 11:30:11',
                'updated_at' => '2025-04-28 11:30:11',
            ),
            10 => 
            array (
                'id' => 11,
                'feature_id' => 2,
                'featureable_type' => 'App\\Models\\Package',
                'featureable_id' => 3,
                'is_default' => 1,
                'created_at' => '2025-04-28 11:30:11',
                'updated_at' => '2025-04-28 11:30:11',
            ),
            11 => 
            array (
                'id' => 12,
                'feature_id' => 3,
                'featureable_type' => 'App\\Models\\Package',
                'featureable_id' => 3,
                'is_default' => 1,
                'created_at' => '2025-04-28 11:30:11',
                'updated_at' => '2025-04-28 11:30:11',
            ),
            12 => 
            array (
                'id' => 13,
                'feature_id' => 4,
                'featureable_type' => 'App\\Models\\Package',
                'featureable_id' => 3,
                'is_default' => 0,
                'created_at' => '2025-04-28 11:30:11',
                'updated_at' => '2025-04-28 11:30:14',
            ),
            13 => 
            array (
                'id' => 14,
                'feature_id' => 1,
                'featureable_type' => 'App\\Models\\Package',
                'featureable_id' => 4,
                'is_default' => 1,
                'created_at' => '2025-04-28 11:30:43',
                'updated_at' => '2025-04-28 11:30:43',
            ),
            14 => 
            array (
                'id' => 15,
                'feature_id' => 2,
                'featureable_type' => 'App\\Models\\Package',
                'featureable_id' => 4,
                'is_default' => 1,
                'created_at' => '2025-04-28 11:30:43',
                'updated_at' => '2025-04-28 11:30:43',
            ),
            15 => 
            array (
                'id' => 16,
                'feature_id' => 3,
                'featureable_type' => 'App\\Models\\Package',
                'featureable_id' => 4,
                'is_default' => 0,
                'created_at' => '2025-04-28 11:30:43',
                'updated_at' => '2025-04-28 11:30:50',
            ),
            16 => 
            array (
                'id' => 17,
                'feature_id' => 1,
                'featureable_type' => 'App\\Models\\Package',
                'featureable_id' => 5,
                'is_default' => 1,
                'created_at' => '2025-04-28 11:31:32',
                'updated_at' => '2025-04-28 11:31:32',
            ),
            17 => 
            array (
                'id' => 18,
                'feature_id' => 2,
                'featureable_type' => 'App\\Models\\Package',
                'featureable_id' => 5,
                'is_default' => 1,
                'created_at' => '2025-04-28 11:31:32',
                'updated_at' => '2025-04-28 11:31:43',
            ),
            18 => 
            array (
                'id' => 19,
                'feature_id' => 3,
                'featureable_type' => 'App\\Models\\Package',
                'featureable_id' => 5,
                'is_default' => 1,
                'created_at' => '2025-04-28 11:31:32',
                'updated_at' => '2025-04-28 11:31:32',
            ),
            19 => 
            array (
                'id' => 20,
                'feature_id' => 4,
                'featureable_type' => 'App\\Models\\Package',
                'featureable_id' => 5,
                'is_default' => 0,
                'created_at' => '2025-04-28 11:31:32',
                'updated_at' => '2025-04-28 11:31:47',
            ),
        ));
        
        
    }
}