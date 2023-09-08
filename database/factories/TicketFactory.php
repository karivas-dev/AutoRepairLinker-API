<?php

namespace Database\Factories;

use App\Models\Car;
use App\Models\Garage;
use App\Models\Ticket;
use App\Models\TicketStatus;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Collection;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Ticket>
 */
class TicketFactory extends Factory
{
    static ?Collection $user_Ids = null;
    static ?Collection $garages = null;
    static ?Collection $car_Ids = null;
    static ?Collection $ticket_statuses = null;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        if (TicketFactory::$user_Ids == null) {
            TicketFactory::$user_Ids = Ticket::pluck('id');
        }
        if (TicketFactory::$garages == null) {
            TicketFactory::$garages = Garage::all();
        }
        if (TicketFactory::$car_Ids == null) {
            TicketFactory::$car_Ids = Car::pluck('id');
        }
        if (TicketFactory::$ticket_statuses == null) {
            TicketFactory::$ticket_statuses = TicketStatus::all();
        }

        $status = TicketFactory::$ticket_statuses->random();
        $garage = $status->name == 'No Asignado' ? null : TicketFactory::$garages->random();

        return [
            'user_id' => TicketFactory::$user_Ids->random(),
            'description' => fake()->paragraph(3),
            'garage_id' => $garage?->id,
            'car_id' => TicketFactory::$car_Ids->random(),
            'branch_id' => $garage?->branches()->pluck('id')->random(),
            'ticket_status_id' => $status->id,
        ];
    }
}
