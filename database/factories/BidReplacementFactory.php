<?php

namespace Database\Factories;

use App\Models\Bid;
use App\Models\Replacement;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Collection;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\BidReplacement>
 */
class BidReplacementFactory extends Factory
{
    static ?Collection $bid_Ids = null;
    static ?Collection $replacements_Ids = null;
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        if (BidReplacementFactory::$bid_Ids == null) {
            BidReplacementFactory::$bid_Ids = Bid::pluck('id');
        }
        if (BidReplacementFactory::$replacements_Ids == null) {
            BidReplacementFactory::$replacements_Ids = Replacement::pluck('id');
        }

        return [
            'bid_id' => BidReplacementFactory::$bid_Ids->random(),
            'replacement_id' => BidReplacementFactory::$replacements_Ids->random(),
            'price' => fake()->randomFloat(2, 0, 10000),
            'quantity' => fake()->randomDigit()
        ];
    }
}
