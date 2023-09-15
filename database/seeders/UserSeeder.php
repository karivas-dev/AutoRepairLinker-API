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
                'email' => 'insurer@insurer.com',
                'branch' => Branch::whereBranchableType('Insurer')->first(),
                'token' => 'd8333c64d3db585a73ead0d895795abc4200499244e4d3c507101ffd79828df8',
                'created_at' => '2023-09-10T18:44:02.000000Z'
            ],
            [
                'email' => 'garage@garage.com',
                'branch' => Branch::whereBranchableType('Garage')->first(),
                'token' => '4d84e4774ddfd0ab5e8c272deed8fe1bf5420af9c96660993097653ee4209fc8',
                'created_at' => '2023-09-10T18:45:09.000000Z'
            ],
            [
                'email' => 'store@store.com',
                'branch' => Branch::whereBranchableType('Store')->first(),
                'token' => '52866f76d9129e8793a18625f29bf624688aa42a8e664f78fa97ddf2dc1c7f7a',
                'created_at' => '2023-09-10T18:46:16.000000Z'
            ],
        ]);

        User::factory(count($credentials))->sequence(fn($sqn) => [
            'email' => $credentials[$sqn->index]['email'],
            'branch_id' => $credentials[$sqn->index]['branch'],
            'isAdmin' => true
        ])->create()->each(function (User $user) use ($credentials) {
            $userFromArray = $credentials->where('email', $user->email)->first();

            $user->tokens()->create([
                'name' => $user->email,
                'token' => $userFromArray['token'],
                'abilities' => ["*"],
                'created_at' => $userFromArray['created_at'],
                'updated_at' => $userFromArray['created_at']
            ]);
        });

        User::factory(50)->sequence(fn() => [
            'branch_id' => UserSeeder::$branch_Ids->random()
        ])->create();
    }
}
