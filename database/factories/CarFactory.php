<?php

namespace Database\Factories;

use App\Models\Insurer;
use App\Models\Model;
use App\Models\Owner;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Collection;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Car>
 */
class CarFactory extends Factory
{
    static ?Collection $ownerIds = null;
    static ?Collection $modelIds = null;
    static ?Collection $insurerIds = null;
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        if (CarFactory::$ownerIds == null) {
            CarFactory::$ownerIds = Owner::pluck('id');
        }
        if (CarFactory::$modelIds == null) {
            CarFactory::$modelIds = Model::pluck('id');
        }
        if (CarFactory::$insurerIds == null) {
            CarFactory::$insurerIds = Insurer::pluck('id');
        }

        return [
            'plates' => fake()->word(),
            'serial_number' => fake()->word(),
            'owner_id' => CarFactory::$ownerIds->random(),
            'model_id' => CarFactory::$modelIds->random(),
            'insurer_id' => CarFactory::$insurerIds->random()
        ];
    }
}
