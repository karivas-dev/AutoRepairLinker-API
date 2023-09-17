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
        $ticketsIds = Ticket::whereRelation('ticket_status', 'name', '!=' ,'No asignado')
            ->orWhereRelation('ticket_status', 'name', '!=', 'Asignado')
            ->pluck('id');

        Bid::factory(25)->sequence(fn($sqn) => [
            'ticket_id' => $ticketsIds->random()
        ])->create();
    }
}
