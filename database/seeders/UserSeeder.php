<?php

namespace Database\Seeders;

use App\Models\Branch;
use App\Models\Garage;
use App\Models\Insurer;
use App\Models\Store;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Collection;

class UserSeeder extends Seeder
{
    static ?Collection $branch_Ids = null;
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        if ( UserSeeder::$branch_Ids == null) {
            UserSeeder::$branch_Ids = Branch::all();
        }

        $credentials = [
            [
                'email' => 'insurer@insurer.com',
                'branch' => Branch::whereBranchableType('Insurer')->first()
            ],
            [
                'email' => 'garage@garage.com',
                'branch' => Branch::whereBranchableType('Garage')->first()
            ],
            [
                'email' => 'store@store.com',
                'branch' => Branch::whereBranchableType('Store')->first()
            ],
        ];

        User::factory(count($credentials))->sequence(fn($sqn) => [
            'email' => $credentials[$sqn->index]['email'],
            'branch_id' => $credentials[$sqn->index]['branch']
        ])->create();

        User::factory(50)->sequence(fn() => [
                'branch_id' => UserSeeder::$branch_Ids->random()
        ])->create();
    }
}
