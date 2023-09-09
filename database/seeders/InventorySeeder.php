<?php

namespace Database\Seeders;

use App\Models\Branch;
use App\Models\Inventory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class InventorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $branchesIds = Branch::whereBranchableType('Store')->pluck('id');

        Inventory::factory(25)->sequence(fn($sqn) => [
            'branch_id' => $branchesIds->random()
        ])->create();
    }
}
