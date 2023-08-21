<?php

namespace Database\Seeders;

use App\Models\BidStatus;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BidStatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $statuses = [
            'Processing',
            'Approved',
            'Rejected'
        ];

        BidStatus::factory(count($statuses))
            ->sequence(fn($sqn) => ['name' => $statuses[$sqn->index]])
            ->create();
    }
}
