<?php

namespace Database\Seeders;

use App\Models\Brand;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ReplacementSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $brands_id = Brand::pluck('id');

        Brand::factory(15)->sequence( fn($sqn) => [
            'brand_id' => $brands_id->random()
        ])->create();
    }
}
