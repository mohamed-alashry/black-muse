<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Country;
use Illuminate\Support\Facades\DB;

class CountrySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
       DB::table('countries')->insert([
            ['name' => json_encode(['ar' => 'السعودية', 'en' => 'Saudi Arabia'])],
            ['name' => json_encode(['ar' => 'مصر', 'en' => 'Egypt'])],
            ['name' => json_encode(['ar' => 'الإمارات', 'en' => 'UAE'])],
            ['name' => json_encode(['ar' => 'الكويت', 'en' => 'Kuwait'])],
            ['name' => json_encode(['ar' => 'قطر', 'en' => 'Qatar'])],
            ['name' => json_encode(['ar' => 'البحرين', 'en' => 'Bahrain'])],
            ['name' => json_encode(['ar' => 'عمان', 'en' => 'Oman'])],
            ['name' => json_encode(['ar' => 'الأردن', 'en' => 'Jordan'])],
            ['name' => json_encode(['ar' => 'لبنان', 'en' => 'Lebanon'])],
            ['name' => json_encode(['ar' => 'فلسطين', 'en' => 'Palestine'])],
            ['name' => json_encode(['ar' => 'سوريا', 'en' => 'Syria'])],
            ['name' => json_encode(['ar' => 'العراق', 'en' => 'Iraq'])],
            ['name' => json_encode(['ar' => 'اليمن', 'en' => 'Yemen'])],
            ['name' => json_encode(['ar' => 'ليبيا', 'en' => 'Libya'])],
            ['name' => json_encode(['ar' => 'الجزائر', 'en' => 'Algeria'])],
            ['name' => json_encode(['ar' => 'المغرب', 'en' => 'Morocco'])],
            ['name' => json_encode(['ar' => 'تونس', 'en' => 'Tunisia'])],
            ['name' => json_encode(['ar' => 'السودان', 'en' => 'Sudan'])],
            ['name' => json_encode(['ar' => 'موريتانيا', 'en' => 'Mauritania'])],
            ['name' => json_encode(['ar' => 'جيبوتي', 'en' => 'Djibouti'])],
            ['name' => json_encode(['ar' => 'جزر القمر', 'en' => 'Comoros'])],
            ['name' => json_encode(['ar' => 'الصومال', 'en' => 'Somalia'])],
        ]);
    }
}
