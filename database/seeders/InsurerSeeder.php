<?php

namespace Database\Seeders;

use App\Models\Branch;
use App\Models\Insurer;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class InsurerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $insuranceCompanies = [
            "Seguro AutoPro",
            "Mundo Asegurado",
            "Seguros del Automóvil",
            "Seguro Vehicular Plus",
            "Protección Mecánica",
            "Protección Total Auto",
            "Asegura AutoYa",
            "Seguro Motorizado",
            "Mundo del Seguro de Autos",
        ];

        Insurer::factory(count($insuranceCompanies))->sequence(fn($sequence) => [
            'name' => $insuranceCompanies[$sequence->index]
        ])->create()->each(function ($insurer) {
            $insurer->branches()->saveMany(Branch::factory(rand(1, 5))->make());
            $insurer->branches()->first()->update(['main' => true]);

            $insurer->users()->saveMany(User::factory(rand(1, 2))->make());
        });
    }
}
