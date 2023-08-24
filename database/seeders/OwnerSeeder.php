<?php

namespace Database\Seeders;

use App\Models\District;
use App\Models\Owner;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class OwnerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $districtsID = District::pluck('id');

        Owner::factory(15)->sequence(fn($sqn) => [
            'district_id' => $districtsID->random()
        ])->create();
    }
}
