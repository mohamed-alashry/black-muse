<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\Item;
use App\Models\Portfolio;

class ItemFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Item::class;

    /**
     * Define the model's default state.
     */
    public function definition(): array
    {
        return [
            'title' => '{}',
            'portfolio_id' => Portfolio::factory(),
            'subtitle' => '{}',
            'content' => '{}',
            'photos' => '{}',
            'sort' => fake()->word(),
            'viewable' => fake()->boolean(),
            'editable' => fake()->boolean(),
            'deletable' => fake()->boolean(),
            'status' => fake()->randomElement(["active","inactive"]),
        ];
    }
}
