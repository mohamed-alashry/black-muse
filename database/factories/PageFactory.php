<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\Page;

class PageFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Page::class;

    /**
     * Define the model's default state.
     */
    public function definition(): array
    {
        return [
            'title' => fake()->sentence(4),
            'meta_title' => '{}',
            'meta_desc' => '{}',
            'viewable' => fake()->boolean(),
            'editable' => fake()->boolean(),
            'deletable' => fake()->boolean(),
            'status' => fake()->randomElement(["active","inactive"]),
        ];
    }
}
