<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            ShieldSeeder::class,
            UserSeeder::class,
            PageSeeder::class,
            SectionSeeder::class,
            SettingsTableSeeder::class,
        ]);

        # development only seeders
        $this->call([
            QuestionsTableSeeder::class,
            QuestionOptionsTableSeeder::class,
            QuestionablesTableSeeder::class,
            FeaturesTableSeeder::class,
            FeatureablesTableSeeder::class,
            ServicesTableSeeder::class,
            PackagesTableSeeder::class,
        ]);
    }
}
