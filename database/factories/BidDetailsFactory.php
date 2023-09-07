<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Collection;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\BidDetails>
 */
class BidDetailsFactory extends Factory
{
    static ?Collection $bid_Ids = null;
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'bid_id' => BidDetailsFactory::$bid_Ids->random(),
            'name' => fake()->words(3),
            'price' => fake()->randomFloat(2, 0.00 )
        ];
    }
}
