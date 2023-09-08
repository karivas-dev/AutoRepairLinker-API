<?php

namespace Database\Factories;

use App\Models\Brand;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Collection;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class ModelFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */

    static ?Collection $brand_Ids = null;

    public function definition(): array
    {
        if (ModelFactory::$brand_Ids == null) {
            ModelFactory::$brand_Ids = Brand::pluck('id');
        }

        return [
            'name' => fake()->word(),
            'brand_id' => ModelFactory::$brand_Ids->random(),
        ];
    }
}
