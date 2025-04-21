<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\BlockedDate;

class BlockedDateFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = BlockedDate::class;

    /**
     * Define the model's default state.
     */
    public function definition(): array
    {
        return [
            'date' => fake()->date(),
        ];
    }
}
