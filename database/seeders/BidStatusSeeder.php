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
        $status = collect([
            'Aprobado',
            'Rechazado',
            'En revisión'
        ]);

        BidStatus::factory(count($status))->sequence( fn ($sequence) => [
            'name' => $status[$sequence->index]
        ])->create();
    }
}
