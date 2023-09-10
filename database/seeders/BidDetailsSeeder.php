<?php

namespace Database\Seeders;

use App\Models\Bid;
use App\Models\BidDetails;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BidDetailsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        BidDetails::factory(Bid::count())->create();
    }
}
