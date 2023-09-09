<?php

namespace Database\Seeders;

use App\Models\Branch;
use App\Models\Brand;
use App\Models\Car;
use App\Models\Owner;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CarSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $branchesIds = Branch::whereBranchableType('Insurer')->pluck('id');

        Car::factory(50)->sequence(fn($sqn) => [
            'branch_id' => $branchesIds->random()
        ])->create();
    }
}
