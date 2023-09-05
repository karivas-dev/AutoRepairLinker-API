<?php

namespace Database\Factories;

use App\Models\BidStatus;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Collection;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Bid>
 */
class BidFactory extends Factory
{
    static ?Collection $bid_Status_Ids = null;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        if (BidFactory::$bid_Status_Ids == null) {
            BidFactory::$bid_Status_Ids = BidStatus::pluck('id');
        }
        return [
            'bid_status_id' => BidFactory::$bid_Status_Ids->random(),
            'budget' => fake()->randomFloat(2),
            'timespan' => fake()->dateTimeBetween('-10 years', '+10 years'),
        ];
    }
}
