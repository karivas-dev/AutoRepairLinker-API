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
        if (UserSeeder::$branch_Ids == null) {
            UserSeeder::$branch_Ids = Branch::all();
        }

        $credentials = collect([
            [
                'email' => 'admin@insurer.com',
                'branch' => Branch::whereBranchableType('Insurer')->first(),
                'isAdmin' => true
            ],
            [
                'email' => 'employee@insurer.com',
                'branch' => Branch::whereBranchableType('Insurer')->first(),
                'isAdmin' => false
            ],
            [
                'email' => 'admin@garage.com',
                'branch' => Branch::whereBranchableType('Garage')->first(),
                'isAdmin' => true
            ],
            [
                'email' => 'employee@garage.com',
                'branch' => Branch::whereBranchableType('Garage')->first(),
                'isAdmin' => false
            ],
            [
                'email' => 'admin@store.com',
                'branch' => Branch::whereBranchableType('Store')->first(),
                'isAdmin' => true
            ],
            [
                'email' => 'employee@store.com',
                'branch' => Branch::whereBranchableType('Store')->first(),
                'isAdmin' => false
            ],
        ]);

        User::factory(count($credentials))->sequence(fn($sqn) => [
            'email' => $credentials[$sqn->index]['email'],
            'branch_id' => $credentials[$sqn->index]['branch'],
            'isAdmin' => $credentials[$sqn->index]['isAdmin']
        ])->create();

        User::factory(25)->sequence(fn() => [
            'branch_id' => UserSeeder::$branch_Ids->random()
        ])->create();
    }
}
