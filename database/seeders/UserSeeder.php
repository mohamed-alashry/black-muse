<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
       $user = User::updateOrCreate(
            ['email' => 'admin@email.com'], 
            [
                'name'     => 'admin',
                'password' => Hash::make('password'),
                'status'   => 'active',
            ]
        );
        $user->assignRole('super_admin');
    }
}
