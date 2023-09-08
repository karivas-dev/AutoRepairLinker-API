<?php

namespace Database\Seeders;

use App\Models\TicketStatus;
use Database\Factories\TicketFactory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TicketStatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $status = collect([
            'No asignado',
            'Asignado',
            'Aceptado',
            'Rechazado',
            'Completado',
            'Cancelado',
            'Reasignación pendiente'
        ]);

        TicketStatus::factory(count($status))->sequence(fn($sequence) => [
            'name' => $status[$sequence->index]
        ])->create();
    }
}
