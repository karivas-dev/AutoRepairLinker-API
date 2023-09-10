<?php

namespace Database\Seeders;

use App\Models\BidReplacement;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BidReplacementSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        BidReplacement::factory(20)->create();
    }
}
