<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class SettingsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {


        \DB::table('settings')->delete();

        \DB::table('settings')->insert(array (
            0 =>
            array (
                'id' => 1,
                'key' => 'x',
                'value' => 'https://www.google.com',
                'created_at' => '2025-04-23 16:12:17',
                'updated_at' => '2025-04-23 16:12:17',
            ),
            1 =>
            array (
                'id' => 2,
                'key' => 'facebook',
                'value' => 'https://www.google.com',
                'created_at' => '2025-04-23 16:12:32',
                'updated_at' => '2025-04-23 16:12:32',
            ),
            2 =>
            array (
                'id' => 3,
                'key' => 'instagram',
                'value' => 'https://www.google.com',
                'created_at' => '2025-04-23 16:13:03',
                'updated_at' => '2025-04-23 16:13:03',
            ),
            3 =>
            array (
                'id' => 4,
                'key' => 'youtube',
                'value' => 'https://www.google.com',
                'created_at' => '2025-04-23 16:13:19',
                'updated_at' => '2025-04-23 16:13:19',
            ),
            4 =>
            array (
                'id' => 5,
                'key' => 'linkedin',
                'value' => 'https://www.google.com',
                'created_at' => '2025-04-23 16:13:26',
                'updated_at' => '2025-04-23 16:13:26',
            ),
            5 =>
            array (
                'id' => 6,
                'key' => 'address',
                'value' => 'Level 7, Building 4.07, King Abdullah Financial District, Riyadh.',
                'created_at' => '2025-04-23 16:13:48',
                'updated_at' => '2025-04-23 16:13:48',
            ),
            6 =>
            array (
                'id' => 7,
                'key' => 'phone',
                'value' => '+966 11 207 4400, +966 11 490 3800.',
                'created_at' => '2025-04-23 16:14:03',
                'updated_at' => '2025-04-23 16:14:03',
            ),
            7 =>
            array (
                'id' => 8,
                'key' => 'email',
                'value' => 'contact@blackmuse.com.sa',
                'created_at' => '2025-04-23 16:14:19',
                'updated_at' => '2025-04-23 16:14:19',
            ),
            8 =>
            array (
                'id' => 9,
                'key' => 'map',
                'value' => '<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d463879.6381369066!2d46.49287159937125!3d24.724831548064437!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3e2f03890d489399%3A0xba974d1c98e79fd5!2sRiyadh%20Saudi%20Arabia!5e0!3m2!1sen!2seg!4v1745424996549!5m2!1sen!2seg" width="100%" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>',
                'created_at' => '2025-04-23 16:16:58',
                'updated_at' => '2025-04-23 16:16:58',
            ),
        ));


    }
}
