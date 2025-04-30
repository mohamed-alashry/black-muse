<?php

namespace Database\Seeders;

use App\Models\Section;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class SectionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //Section::factory()->count(5)->create();
        $html_en = "Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.";

        $html_ar = 'لوريم إيبسوم(Lorem Ipsum) هو ببساطة نص شكلي (بمعنى أن الغاية هي الشكل وليس المحتوى) ويُستخدم في صناعات المطابع ودور النشر. كان لوريم إيبسوم ولايزال المعيار للنص الشكلي منذ القرن الخامس عشر عندما قامت مطبعة مجهولة برص مجموعة من الأحرف بشكل عشوائي أخذتها من نص، لتكوّن كتيّب بمثابة دليل أو مرجع شكلي لهذه الأحرف. خمسة قرون من الزمن لم تقضي على هذا النص، بل انه حتى صار مستخدماً وبشكله الأصلي في الطباعة والتنضيد الإلكتروني. انتشر بشكل كبير في ستينيّات هذا القرن مع إصدار رقائق "ليتراسيت" (Letraset) البلاستيكية تحوي مقاطع من هذا النص، وعاد لينتشر مرة أخرى مؤخراَ مع ظهور برامج النشر الإلكتروني مثل "ألدوس بايج مايكر" (Aldus PageMaker) والتي حوت أيضاً على نسخ من نص لوريم إيبسوم.';

        $sections = [
            [
                'id'         => 1,
                'title'      => json_encode(['en' => 'About Black Muse', 'ar' => 'عن Black Muse']),
                'page_id'    => 1,
                'subtitle'   => json_encode(['ar' => null]),
                'content'    => json_encode([
                    "en" => $html_en,
                    "ar" => $html_ar
                ]),
                'sort'       => 1,
                'viewable'   => 1,
                'editable'   => 1,
                'deletable'  => 1,
                'status'     => 'active',
                'created_at' => Carbon::parse('2025-04-18 20:41:16'),
                'updated_at' => Carbon::parse('2025-04-18 20:45:01'),
            ],
            [
                'id'         => 2,
                'title'      => json_encode(['en' => 'About Black Muse', 'ar' => 'عن Black Muse']),
                'page_id'    => 2,
                'subtitle'   => json_encode(['ar' => null]),
                'content'    => json_encode([
                    "en" => $html_en,
                    "ar" => $html_ar
                ]),
                'sort'       => 1,
                'viewable'   => 1,
                'editable'   => 1,
                'deletable'  => 1,
                'status'     => 'active',
                'created_at' => Carbon::parse('2025-04-18 20:41:16'),
                'updated_at' => Carbon::parse('2025-04-18 20:45:01'),
            ],
            [
                'id'         => 3,
                'title'      => json_encode(['en' => 'About Black Muse', 'ar' => 'عن Black Muse']),
                'page_id'    => 3,
                'subtitle'   => json_encode(['ar' => null]),
                'content'    => json_encode([
                    "en" => $html_en,
                    "ar" => $html_ar
                ]),
                'sort'       => 1,
                'viewable'   => 1,
                'editable'   => 1,
                'deletable'  => 1,
                'status'     => 'active',
                'created_at' => Carbon::parse('2025-04-18 20:41:16'),
                'updated_at' => Carbon::parse('2025-04-18 20:45:01'),
            ],
            [
                'id'         => 4,
                'title'      => json_encode(['en' => 'About Black Muse', 'ar' => 'عن Black Muse']),
                'page_id'    => 4,
                'subtitle'   => json_encode(['ar' => null]),
                'content'    => json_encode([
                    "en" => $html_en,
                    "ar" => $html_ar
                ]),
                'sort'       => 1,
                'viewable'   => 1,
                'editable'   => 1,
                'deletable'  => 1,
                'status'     => 'active',
                'created_at' => Carbon::parse('2025-04-18 20:41:16'),
                'updated_at' => Carbon::parse('2025-04-18 21:27:46'),
            ],

            [
                'id'         => 5,
                'title'      => json_encode(['en' => 'You need to pay a down payment', 'ar' => '']),
                'page_id'    => 5,
                'subtitle'   => json_encode(['ar' => null]),
                'content'    => json_encode([
                    "en" => $html_en,
                    "ar" => $html_ar
                ]),
                'sort'       => 1,
                'viewable'   => 1,
                'editable'   => 1,
                'deletable'  => 1,
                'status'     => 'active',
                'created_at' => Carbon::parse('2025-04-18 20:41:16'),
                'updated_at' => Carbon::parse('2025-04-18 21:27:46'),
            ],

            [
                'id'         => 6,
                'title'      => json_encode(['en' => 'Choose the Meeting Time', 'ar' => '']),
                'page_id'    => 6,
                'subtitle'   => json_encode(['ar' => null]),
                'content'    => json_encode([
                    "en" => $html_en,
                    "ar" => $html_ar
                ]),
                'sort'       => 1,
                'viewable'   => 1,
                'editable'   => 1,
                'deletable'  => 1,
                'status'     => 'active',
                'created_at' => Carbon::parse('2025-04-18 20:41:16'),
                'updated_at' => Carbon::parse('2025-04-18 21:27:46'),
            ],



        ];

        foreach ($sections as $section) {
            DB::table('sections')->updateOrInsert(
                ['id' => $section['id']],
                $section
            );
        }
    }
}
