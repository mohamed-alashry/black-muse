<?php

namespace Database\Seeders;

use App\Models\Page;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class PageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //Page::factory()->count(5)->create();
        $pages = [
            [
                'id'         => 1,
                'title'      => 'Home',
                'meta_title' => json_encode(['ar' => 'هوم', 'en' => 'Home Page']),
                'meta_desc'  => json_encode(['en' => 'Home PageHome PageHome PageHome PageHome Page', 'ar' => 'هوم']),
                'viewable'   => 1,
                'editable'   => 1,
                'deletable'  => 0,
                'status'     => 'active',
                'created_at' => Carbon::parse('2025-04-16 18:24:44'),
                'updated_at' => Carbon::parse('2025-04-18 21:03:40'),
            ],
            [
                'id'         => 2,
                'title'      => 'Our Portfolio',
                'meta_title' => json_encode(['en' => 'Our Portfolio Page', 'ar' => 'نماذج من أعمالنا']),
                'meta_desc'  => json_encode(['en' => 'Our Portfolio Page', 'ar' => 'نماذج من أعمالنا']),
                'viewable'   => 1,
                'editable'   => 1,
                'deletable'  => 0,
                'status'     => 'active',
                'created_at' => Carbon::parse('2025-04-18 21:01:54'),
                'updated_at' => Carbon::parse('2025-04-18 21:02:32'),
            ],
            [
                'id'         => 3,
                'title'      => 'About Us',
                'meta_title' => json_encode(['en' => 'About Us Page', 'ar' => 'نبذة عن ']),
                'meta_desc'  => json_encode(['en' => 'Know More About Us', 'ar' => 'نبذة عن Black Muse']),
                'viewable'   => 1,
                'editable'   => 1,
                'deletable'  => 0,
                'status'     => 'active',
                'created_at' => Carbon::parse('2025-04-18 21:10:29'),
                'updated_at' => Carbon::parse('2025-04-18 21:12:00'),
            ],
            [
                'id'         => 4,
                'title'      => 'Our Contact Us',
                'meta_title' => json_encode(['en' => 'Our Contact Us Page', 'ar' => 'تواصل مع Black Muse']),
                'meta_desc'  => json_encode(['en' => 'Our Contact Us Page', 'ar' => 'تواصل مع Black Muse']),
                'viewable'   => 1,
                'editable'   => 1,
                'deletable'  => 0,
                'status'     => 'active',
                'created_at' => Carbon::parse('2025-04-18 21:20:12'),
                'updated_at' => Carbon::parse('2025-04-18 21:21:05'),
            ],
        ];


        foreach ($pages as $page) {
            DB::table('pages')->updateOrInsert(
                ['id' => $page['id']],
                $page
            );
        }
    }
}
