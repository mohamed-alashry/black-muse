<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\Page;
use App\Models\Section;

class SectionFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Section::class;

    /**
     * Define the model's default state.
     */
    public function definition(): array
    {
        return [
            'title' => '{}',
            'page_id' => Page::factory(),
            'subtitle' => '{}',
            'content' => '{}',
            'sort' => fake()->word(),
            'viewable' => fake()->boolean(),
            'editable' => fake()->boolean(),
            'deletable' => fake()->boolean(),
            'status' => fake()->randomElement(["active","inactive"]),
        ];
    }
}
