<?php

namespace Database\Factories;

use App\Models\Inventory;
use App\Models\Replacement;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Collection;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Inventory>
 */
class InventoryFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    static ?Collection $store_Ids = null;
    static ?Collection $replacement_Ids = null;
    public function definition(): array
    {
        if (InventoryFactory::$store_Ids == null) {
            InventoryFactory::$store_Ids = Inventory::pluck('id');
        }
        if (InventoryFactory::$replacement_Ids == null) {
            InventoryFactory::$store_Ids = Replacement::pluck('id');
        }
        return [
            'replacement_id' => InventoryFactory::$replacement_Ids->random(),
            'quantity' => fake()->randomNumber(3),
            'unit_price' => fake()->randomFloat(2)
        ];
    }
}
