<?php

namespace Database\Factories;

use App\Models\District;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Collection;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Branch>
 */
class BranchFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */

    static ?Collection $districtIds = null;
    public function definition(): array
    {
        if (BranchFactory::$districtIds == null) {
            BranchFactory::$districtIds = District::pluck('id');
        }

        return [
            'telephone' => fake()->phoneNumber(),
            'email' => fake()->safeEmail(),
            'main' => false,
            'district_id' => BranchFactory::$districtIds->random(),
        ];
    }
}
