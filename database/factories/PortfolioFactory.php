<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\Portfolio;

class PortfolioFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Portfolio::class;

    /**
     * Define the model's default state.
     */
    public function definition(): array
    {
        return [
            'title' => fake()->sentence(4),
            'photo' => fake()->word(),
            'meta_title' => '{}',
            'meta_desc' => '{}',
            'viewable' => fake()->boolean(),
            'editable' => fake()->boolean(),
            'deletable' => fake()->boolean(),
            'status' => fake()->randomElement(["active","inactive"]),
        ];
    }
}
