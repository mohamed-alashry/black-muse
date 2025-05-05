<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\Gallery;

class GalleryFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Gallery::class;

    /**
     * Define the model's default state.
     */
    public function definition(): array
    {
        return [
            'media' => fake()->word(),
            'type' => fake()->randomElement(["image","video","link"]),
            'sort' => fake()->numberBetween(-1000, 1000),
        ];
    }
}
