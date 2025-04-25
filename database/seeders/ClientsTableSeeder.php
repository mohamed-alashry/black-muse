<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class ClientsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('clients')->delete();
        
        \DB::table('clients')->insert(array (
            0 => 
            array (
                'id' => 1,
                'name' => 'ashry',
                'email' => 'ashry@email.com',
                'phone_number' => '9661234321',
                'password' => '$2y$12$5vWBru.7lFZCenPceUSMte68WrivfjixJmL9LMJkWIGywNeHUgKXq',
                'address' => 'here',
                'status' => 'active',
                'remember_token' => NULL,
                'created_at' => '2025-04-25 21:01:17',
                'updated_at' => '2025-04-25 21:01:17',
            ),
            1 => 
            array (
                'id' => 2,
                'name' => 'nasr',
                'email' => 'nasr@email.com',
                'phone_number' => '9667854321',
                'password' => '$2y$12$yY7VqKq/fOrgVLxt2kqh7uHPTJq.wNwgtlnSwk67UYzCM7QKZTGkW',
                'address' => 'here',
                'status' => 'active',
                'remember_token' => NULL,
                'created_at' => '2025-04-25 21:02:11',
                'updated_at' => '2025-04-25 21:02:11',
            ),
        ));
        
        
    }
}