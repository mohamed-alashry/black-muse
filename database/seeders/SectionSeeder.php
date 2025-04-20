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
        $html_en = '
                  <!-- About Section -->
                  <section class="about-section py-5 " style="background-image: url(./images/about-bg.png);">
                    <div class="container d-flex flex-column gap-3 text-white">
                      <h2 class="fw-lighter text-white">
                        About
                        <strong class="text-gold">Black Muse</strong>
                      </h2>
                      <p class="fw-lighter fs-5"> My journey behind the lens began in 2012 when I chose photography as an elective
                        course at
                        King Abdulaziz University in Jeddah a surprising pairing with my medical studies. Graduating in 2015, I held not
                        only a degree but also a passion yearning for expression.</p>
                      <div>
                        <h6 class="fs-4">
                          Honing My Craft and Building My Studio: Between 2015
                        </h6>
                        <p class="fw-lighter fs-5">
                          and 2019, I dedicated myself to refining my photography skills under the guidance of world-class trainers and
                          photographers. In 2018, my dream of establishing Reem Awad Studio  became a reality
                        </p>
                      </div>
                      <div>

                        <h6 class="fs-4">
                          Black Muse by Reem Awad:
                        </h6>
                        <p class="fw-lighter fs-5">
                          A Haven of Creative Excellence: Black Muse is the perfect destination to capture lifes most precious
                          moments.
                          Equipped with state-of-the-art equipment and an in-house studio, we offer a range of services, including
                          couples, family, and maternity shoots. Our professional outdoor photography services, coupled with top-tier
                          equipment and a team with over 7 years of experience, guarantee stunning results.
                        </p>
                      </div>
                      <div>
                        <h6 class="fs-4">
                          Expanding and Innovating:
                        </h6>
                        <p class="fw-lighter fs-5">
                          To better serve our clients, we introduced aerial photography services in 2018, becoming one of the pioneers
                          in
                          this highly sought-after field. From weddings to corporate events, our drone photography adds a unique
                          perspective to any occasion.
                        </p>
                      </div>
                      <button type="button" class="btn btn-outline-light rounded-4 p-2 align-self-baseline fw-lighter ms-auto">
                        <i class="fa-solid fa-arrow-right-to-bracket"></i> See our Portofolio</button>
                    </div>
                  </section>

                ';

        $html_ar = '
                 <!-- قسم من نحن -->
                    <section class="about-section py-5" style="background-image: url(./images/about-bg.png);">
                      <div class="container d-flex flex-column gap-3 text-white text-end" dir="rtl">
                        <h2 class="fw-lighter text-white">
                          من نحن في
                          <strong class="text-gold">Black Muse</strong>
                        </h2>

                        <p class="fw-lighter fs-5">
                          بدأت رحلتي خلف العدسة في عام 2012 عندما اخترت التصوير الفوتوغرافي كمادة اختيارية في جامعة الملك عبد العزيز بجدة، وهو اختيار مفاجئ إلى جانب دراستي الطبية. تخرجت في عام 2015، حاملةً شهادة دراسية، وشغفاً ينتظر التعبير.
                        </p>

                        <div>
                          <h6 class="fs-4">
                            تطوير مهاراتي وبناء الاستوديو: بين عامي 2015 و2019
                          </h6>
                          <p class="fw-lighter fs-5">
                            كرّست وقتي لصقل مهاراتي في التصوير الفوتوغرافي تحت إشراف مدربين ومصورين عالميين. وفي عام 2018، تحقق حلمي بتأسيس "استوديو ريم عوض".
                          </p>
                        </div>

                        <div>
                          <h6 class="fs-4">
                            Black Muse من ريم عوض:
                          </h6>
                          <p class="fw-lighter fs-5">
                            ملاذ للإبداع والتميّز: يُعد Black Muse الوجهة المثالية لتوثيق أجمل لحظات الحياة. نحن مجهزون بأحدث المعدات، ولدينا استوديو داخلي يقدم خدمات متعددة تشمل جلسات تصوير للثنائيات، والعائلات، والحوامل. فريقنا ذو خبرة تتجاوز 7 سنوات، إلى جانب معدات احترافية تضمن نتائج مذهلة.
                          </p>
                        </div>

                        <div>
                          <h6 class="fs-4">
                            التوسع والابتكار:
                          </h6>
                          <p class="fw-lighter fs-5">
                            لتقديم خدمات أفضل لعملائنا، قمنا بإدخال خدمات التصوير الجوي منذ عام 2018، لنكون من الأوائل في هذا المجال المميز. من حفلات الزفاف إلى الفعاليات الكبرى، تضيف كاميرات الدرون لمسة فريدة لكل مناسبة.
                          </p>
                        </div>

                        <button type="button" class="btn btn-outline-light rounded-4 p-2 align-self-baseline fw-lighter me-auto">
                          <i class="fa-solid fa-arrow-right-to-bracket"></i> تصفح معرض أعمالنا
                        </button>
                      </div>
                    </section>
                ';

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
        ];

        foreach ($sections as $section) {
            DB::table('sections')->updateOrInsert(
                ['id' => $section['id']],
                $section
            );
        }
    }
}
