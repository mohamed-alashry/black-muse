<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\Package;
use App\Models\Service;

class PackageFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Package::class;

    /**
     * Define the model's default state.
     */
    public function definition(): array
    {
        return [
            'name' => '{}',
            'service_id' => Service::factory(),
            'base_price' => fake()->randomFloat(0, 0, 9999999999.),
            'status' => fake()->randomElement(["active","inactive"]),
        ];
    }
}
