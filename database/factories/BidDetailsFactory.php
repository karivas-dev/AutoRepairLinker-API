<?php

namespace Database\Factories;

use App\Models\Bid;
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
        if (BidDetailsFactory::$bid_Ids == null) {
            BidDetailsFactory::$bid_Ids = Bid::pluck('id');
        }

        return [
            'bid_id' => BidDetailsFactory::$bid_Ids->random(),
            'name' => fake()->words(2, true),
            'price' => fake()->randomFloat(2, 0, 10000)
        ];
    }
}
