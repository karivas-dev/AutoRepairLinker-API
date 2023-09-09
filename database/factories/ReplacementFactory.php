<?php

namespace Database\Factories;

use App\Models\Model;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Collection;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Replacement>
 */
class ReplacementFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    static ?Collection $modelIds = null;
    public function definition(): array
    {
        if (ReplacementFactory::$modelIds == null) {
            ReplacementFactory::$modelIds = Model::pluck('id');
        }

        return [
            'name' => fake()->word(),
            'description' => fake()->text(255),
            'model_id' => ReplacementFactory::$modelIds->random()
        ];
    }
}
