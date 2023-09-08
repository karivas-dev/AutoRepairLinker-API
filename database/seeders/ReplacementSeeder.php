<?php

namespace Database\Seeders;

use App\Models\Model;
use App\Models\Replacement;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ReplacementSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $models_id = Model::pluck('id');

        Replacement::factory(15)->sequence( fn($sqn) => [
            'model_id' => $models_id->random()
        ])->create();
    }
}
