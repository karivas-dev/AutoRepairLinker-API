<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            StatesTownsDistrictsSeeder::class,
            TicketStatusSeeder::class,
            BidStatusSeeder::class,
            StoreSeeder::class,
            GarageSeeder::class,
            InsurerSeeder::class,
            OwnerSeeder::class,
            BrandSeeder::class,
            ModelSeeder::class,
            ReplacementSeeder::class,
            UserSeeder::class,
            CarSeeder::class,
            InventorySeeder::class,
            TicketSeeder::class,
            BidSeeder::class,

        ]);
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
    }
}
