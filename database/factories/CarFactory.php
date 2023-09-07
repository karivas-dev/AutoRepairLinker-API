<?php

namespace Database\Factories;

use App\Models\Model;
use App\Models\Owner;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Collection;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Car>
 */
class CarFactory extends Factory
{
    static ?Collection $owner_Ids = null;
    static ?Collection $model_Ids = null;
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        if (CarFactory::$owner_Ids == null) {
            CarFactory::$owner_Ids = Owner::pluck('id');
        }
        if (CarFactory::$model_Ids == null) {
            CarFactory::$model_Ids = Model::pluck('id');
        }

        return [
            'plates' => fake()->word(),
            'serial_number' => fake()->word(),
            'owner_id' => CarFactory::$owner_Ids->random(),
            'model_id' => CarFactory::$model_Ids->random(),
        ];
    }
}
