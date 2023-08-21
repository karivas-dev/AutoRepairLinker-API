<?php

namespace Database\Seeders;

use App\Models\StatusTicket;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class StatusTicketSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $statuses = [
            'Assigned',
            'Rejected',
            'Completed',
            'Cancelled',
            'Reassigned',
            'Accepted'
        ];

        StatusTicket::factory(count($statuses))
            ->sequence(fn($sqn) => ['name' => $statuses[$sqn->index]])
            ->create();
    }
}
