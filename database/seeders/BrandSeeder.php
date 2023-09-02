<?php

namespace Database\Seeders;

use App\Models\Brand;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BrandSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $brands = [
            "Toyota",
            "Honda",
            "Ford",
            "Chevrolet",
            "Volkswagen",
            "Nissan",
            "BMW",
            "Mercedes-Benz",
            "Audi",
            "Hyundai",
            "Kia",
            "Mazda",
            "Lexus",
            "Subaru",
            "Jeep",
            "Tesla",
            "Ferrari",
            "Porsche",
            "Maserati",
            "Jaguar",
            "Land Rover",
            "Volvo",
            "Chrysler",
            "Dodge",
            "Buick",
            "Cadillac",
            "Lincoln",
            "Acura",
            "Infiniti",
            "GMC",
            "Mini",
            "Ram",
            "Bentley",
            "Rolls-Royce",
            "Lamborghini",
            "Bugatti",
            "McLaren",
            "Alfa Romeo",
            "Aston Martin",
            "Fiat",
            "Genesis",
            "Lotus",
            "Mitsubishi",
            "Pagani",
            "Smart",
            "Tata",
            "Suzuki",
            "Dacia",
            "Geely",
            "Great Wall",
            "Haval",
            "Isuzu",
            "Mitsubishi",
            "NIO",
            "SsangYong",
            "Subaru",
            "BYD",
            "Changan",
            "Chery",
            "Foton",
            "SAIC",
            "Zotye",
            "Volga",
            "Lada",
            "GAZ",
            "Moskvich",
            "UAZ",
            "ZAZ",
            "Lifan",
            "Wuling",
            "Nikola",
            "Rivian",
            "Lucid Motors",
            "Rimac",
        ];

        Brand::factory(count($brands))->sequence( fn($sequence) => [
            'name' => $brands[$sequence->index]
        ])->create();
    }
}
