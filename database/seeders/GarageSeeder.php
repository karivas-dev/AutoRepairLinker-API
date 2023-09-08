<?php

namespace Database\Seeders;

use App\Models\Branch;
use App\Models\Garage;
use App\Models\User;
use Illuminate\Database\Seeder;

class GarageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $garageNames = [
            "Taller MotorPro",
            "Garaje Rápido y Fiable",
            "Mecánica Total",
            "AutoMantenimiento",
            "GaragePro",
            "Mecánicos Expertos",
            "Reparaciones de Confianza",
            "Garaje Master",
            "Taller de Autos Profesional",
            "AutoCuidado",
            "Mecánica en Acción",
            "Taller de Emergencia",
            "Garaje Veloz",
            "AutoServicio Integral",
            "Mecánicos a Domicilio",
            "GarageMundo",
            "Taller en Ruedas",
            "Reparaciones Express",
            "Garaje Perfecto",
            "AutoSoluciones",
            "Mecánica de Vanguardia",
            "Taller en Marcha",
            "GarageRápido",
            "AutoAfinación",
            "Mecánicos de Excelencia",
            "Taller de Potencia",
            "GarajeMaestro",
            "AutoCura",
            "Mecánica al Instante",
            "Taller de Automóviles Premium",
        ];

        Garage::factory(count($garageNames))->sequence(fn($sequence) => [
            'name' => $garageNames[$sequence->index]
        ])->create()->each(function ($garage) {
            $garage->branches()->saveMany(Branch::factory(rand(1, 5))->make());
            $garage->branches()->first()->update(['main' => true]);

            $garage->users()->saveMany(User::factory(rand(1, 2))->make());
        });
    }
}
