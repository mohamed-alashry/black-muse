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
                'feature_id' => 1,
                'featureable_type' => 'App\\Models\\Package',
                'featureable_id' => 1,
                'is_default' => 1,
                'created_at' => '2025-04-25 20:43:00',
                'updated_at' => '2025-04-25 20:43:00',
            ),
            1 => 
            array (
                'id' => 2,
                'feature_id' => 2,
                'featureable_type' => 'App\\Models\\Package',
                'featureable_id' => 1,
                'is_default' => 1,
                'created_at' => '2025-04-25 20:43:53',
                'updated_at' => '2025-04-25 20:43:53',
            ),
            2 => 
            array (
                'id' => 3,
                'feature_id' => 3,
                'featureable_type' => 'App\\Models\\Package',
                'featureable_id' => 1,
                'is_default' => 1,
                'created_at' => '2025-04-25 20:44:05',
                'updated_at' => '2025-04-25 20:44:05',
            ),
            3 => 
            array (
                'id' => 4,
                'feature_id' => 4,
                'featureable_type' => 'App\\Models\\Package',
                'featureable_id' => 1,
                'is_default' => 0,
                'created_at' => '2025-04-25 20:44:20',
                'updated_at' => '2025-04-25 20:44:20',
            ),
            4 => 
            array (
                'id' => 5,
                'feature_id' => 5,
                'featureable_type' => 'App\\Models\\Package',
                'featureable_id' => 1,
                'is_default' => 0,
                'created_at' => '2025-04-25 20:44:34',
                'updated_at' => '2025-04-25 20:44:34',
            ),
            5 => 
            array (
                'id' => 6,
                'feature_id' => 1,
                'featureable_type' => 'App\\Models\\Package',
                'featureable_id' => 2,
                'is_default' => 1,
                'created_at' => '2025-04-25 20:45:20',
                'updated_at' => '2025-04-25 20:45:20',
            ),
            6 => 
            array (
                'id' => 7,
                'feature_id' => 2,
                'featureable_type' => 'App\\Models\\Package',
                'featureable_id' => 2,
                'is_default' => 1,
                'created_at' => '2025-04-25 20:45:20',
                'updated_at' => '2025-04-25 20:45:20',
            ),
            7 => 
            array (
                'id' => 8,
                'feature_id' => 3,
                'featureable_type' => 'App\\Models\\Package',
                'featureable_id' => 2,
                'is_default' => 0,
                'created_at' => '2025-04-25 20:45:35',
                'updated_at' => '2025-04-25 20:45:35',
            ),
            8 => 
            array (
                'id' => 9,
                'feature_id' => 5,
                'featureable_type' => 'App\\Models\\Package',
                'featureable_id' => 2,
                'is_default' => 0,
                'created_at' => '2025-04-25 20:45:35',
                'updated_at' => '2025-04-25 20:45:35',
            ),
            9 => 
            array (
                'id' => 10,
                'feature_id' => 1,
                'featureable_type' => 'App\\Models\\Package',
                'featureable_id' => 3,
                'is_default' => 1,
                'created_at' => '2025-04-25 20:46:27',
                'updated_at' => '2025-04-25 20:46:27',
            ),
            10 => 
            array (
                'id' => 11,
                'feature_id' => 2,
                'featureable_type' => 'App\\Models\\Package',
                'featureable_id' => 3,
                'is_default' => 1,
                'created_at' => '2025-04-25 20:46:27',
                'updated_at' => '2025-04-25 20:46:27',
            ),
            11 => 
            array (
                'id' => 12,
                'feature_id' => 3,
                'featureable_type' => 'App\\Models\\Package',
                'featureable_id' => 3,
                'is_default' => 1,
                'created_at' => '2025-04-25 20:46:27',
                'updated_at' => '2025-04-25 20:46:27',
            ),
            12 => 
            array (
                'id' => 13,
                'feature_id' => 4,
                'featureable_type' => 'App\\Models\\Package',
                'featureable_id' => 3,
                'is_default' => 0,
                'created_at' => '2025-04-25 20:46:35',
                'updated_at' => '2025-04-25 20:46:35',
            ),
            13 => 
            array (
                'id' => 14,
                'feature_id' => 5,
                'featureable_type' => 'App\\Models\\Package',
                'featureable_id' => 3,
                'is_default' => 0,
                'created_at' => '2025-04-25 20:46:35',
                'updated_at' => '2025-04-25 20:46:35',
            ),
        ));
        
        
    }
}