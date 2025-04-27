<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class PackagesTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {


        \DB::table('packages')->delete();

        \DB::table('packages')->insert(array (
            0 =>
                array (
                    'id' => 1,
                    'name' => '{"en": "ELEGANT BOX"}',
                    'service_id' => 1,
                    'base_price' => '1000.00',
                    'status' => 'active',
                    'created_at' => '2025-04-25 20:42:37',
                    'updated_at' => '2025-04-25 20:42:37',
                ),
            1 =>
                array (
                    'id' => 2,
                    'name' => '{"en": "Album Package"}',
                    'service_id' => 2,
                    'base_price' => '1000.00',
                    'status' => 'active',
                    'created_at' => '2025-04-25 20:42:37',
                    'updated_at' => '2025-04-25 20:42:37',
                ),
            2 =>
            array (
                'id' => 3,
                'name' => '{"en": "Gold Package"}',
                'service_id' => 3,
                'base_price' => '1000.00',
                'status' => 'active',
                'created_at' => '2025-04-25 20:42:37',
                'updated_at' => '2025-04-25 20:42:37',
            ),
            3 =>
            array (
                'id' => 4,
                'name' => '{"en": "Silver Package"}',
                'service_id' => 3,
                'base_price' => '700.00',
                'status' => 'active',
                'created_at' => '2025-04-25 20:45:05',
                'updated_at' => '2025-04-25 20:45:05',
            ),
            4 =>
            array (
                'id' => 5,
                'name' => '{"en": "Basic"}',
                'service_id' => 4,
                'base_price' => '1000.00',
                'status' => 'active',
                'created_at' => '2025-04-25 20:46:07',
                'updated_at' => '2025-04-25 20:46:07',
            ),
        ));


    }
}
