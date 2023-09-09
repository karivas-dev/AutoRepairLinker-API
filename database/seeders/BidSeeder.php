<?php

namespace Database\Seeders;

use App\Models\Bid;
use App\Models\Ticket;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BidSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $ticketsIds = Ticket::whereRelationIn('status', 'name', ['Aceptado', 'Completado'])->pluck('id');
        dd($ticketsIds);
        Bid::factory()->sequence(fn() => [

        ])->create();
    }
}
