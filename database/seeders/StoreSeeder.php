<?php

namespace Database\Seeders;

use App\Models\Branch;
use App\Models\Store;
use App\Models\User;
use Illuminate\Database\Seeder;

class StoreSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $replacementStores = [
            "AutoPartes Rápidas",
            "Reparaciones Express",
            "Recambios Veloces",
            "Piezas de Repuesto Total",
            "Mundo de Refacciones",
            "Soluciones Automotrices",
            "Tienda de Sustitutos",
            "Piezas Directas",
            "Repuestos a Tu Alcance",
            "Automóviles en Rehabilitación",
            "Refacciones Amigables",
            "Todo en Repuestos",
            "Automovilística Rápida",
            "Servicio de Reposición",
            "Repuestos Eficientes",
            "Soluciones Mecánicas",
            "Tienda de Sustitución",
            "Reemplazos de Calidad",
            "Recambios Instantáneos",
            "Piezas para Autos",
            "Repuestos de Confianza",
            "AutoMágico",
            "Rápido Refaccionario",
            "Sustitutos Profesionales",
            "La Rueda de Repuestos",
            "Auto-Rescue",
            "Piezas en Tiempo Real",
            "Refaccionario Express",
            "Sustitutos Expertos",
            "Autopartes Prontas",
            "Mundo del Repuesto",
        ];

        Store::factory(count($replacementStores))->sequence(fn($sequence) => [
            'name' => $replacementStores[$sequence->index]
        ])->create()->each(function ($store) {
            $store->branches()->saveMany(Branch::factory(rand(1, 5))->make());
            $store->branches()->first()->update(['main' => true]);
        });;
    }
}
