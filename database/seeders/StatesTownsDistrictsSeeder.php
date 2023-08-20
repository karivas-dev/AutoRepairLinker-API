<?php

namespace Database\Seeders;

use App\Models\District;
use App\Models\State;
use App\Models\Town;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class StatesTownsDistrictsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $states = collect([
        [
            'name' => 'Ahuachapan',
            'towns' => [
                [
                    'name' => 'Ahuachapán Norte',
                    'districts' => [
                      'Atiquizaya',
                      'El Refugio',
                      'San Lorenzo',
                      'Turín'
                    ]
                ],
                [
                    'name' => 'Ahuachapán Centro',
                    'districts' => [
                        'Ahuachapán',
                        'Apaneca',
                        'Concepción de Ataco',
                        'Tacuba'
                    ]
                ],
                [
                    'name' => 'Ahuachapán Sur',
                    'districts' => [
                        'Guaymango',
                        'Jujutla',
                        'San Francisco Menéndez',
                        'San Pedro Puxtla'
                    ]
                ]
            ]
        ],
        [
            'name' => 'Cabañas',
            'towns' => [
                [
                    'name' => 'Cabañas Este',
                    'districts' => [
                        'Sensuntepeque',
                        'Victoria',
                        'Dolores',
                        'Guacotecti',
                        'San Isidro'
                    ]
                ],
                [
                    'name' => 'Cabañas Oeste',
                    'districts' => [
                        'Ilobasco',
                        'Tejutepeque',
                        'Jutiapa',
                        'Cinquera'
                    ]
                ]
            ]
        ],
        [
            'name' => 'Chalatenango',
            'towns' => [
                [
                    'name' => 'Chalatenango Norte',
                    'districts' => [
                        'La Palma',
                        'Citalá',
                        'San Ignacio'
                    ]
                ],
                [
                    'name' => 'Chalatenango Centro',
                    'districts' => [
                        'Nueva Concepción',
                        'Tejutla',
                        'La Reina',
                        'Agua Caliente',
                        'Dulce Nombre de María',
                        'El Paraíso',
                        'San Fernando',
                        'San Francisco Morazán',
                        'San Rafael',
                        'Santa Rita'
                    ]
                ],
                [
                    'name' => 'Chalatenango Sur',
                    'districts' => [
                        'Chalatenango',
                        'Arcatao',
                        'Azacualpa',
                        'Cancasque',
                        'Comalapa',
                        'Concepción Quezaltepeque',
                        'El Carrizal',
                        'La Laguna',
                        'Las Flores',
                        'Las Vueltas',
                        'Nombre de Jesús',
                        'Nueva Trinidad',
                        'Ojos de Agua',
                        'Potonico',
                        'San Antonio de la Cruz',
                        'San Antonio Los Ranchos',
                        'San Francisco Lempa',
                        'San Isidro Labrador',
                        'San Luis del Carmen',
                        'San Miguel de Mercedes'
                    ]
                ]
            ]
        ],
        [
            'name' => 'Cuscatlán',
            'towns' => [
                [
                    'name' => 'Cuscatlán Norte',
                    'districts' => [
                        'Suchitoto',
                        'San José Guayabal',
                        'Oratorio de Concepción',
                        'San Bartolomé Perulapía',
                        'San Pedro Perulapán'
                    ],
                ],
                [
                    'name' => 'Cuscatlán Sur',
                    'districts' => [
                        'Cojutepeque',
                        'Candelaria',
                        'El Carmen',
                        'El Rosario',
                        'Monte San Juan',
                        'San Cristóbal',
                        'San Rafael Cedros',
                        'San Ramón',
                        'Santa Cruz Analquito',
                        'Santa Cruz Michapa',
                        'Tenancingo'
                    ]
                ]
            ],
        ],
        [
            'name' => 'La Libertad',
            'towns' => [
                [
                    'name' => 'La Libertad Norte',
                    'districts' => [
                        'Quezaltepeque',
                        'San Matías',
                        'San Pablo Tacachico'
                    ]
                ],
                [
                    'name' => 'La Libertad Centro',
                    'districts' => [
                        'San Juan Opico',
                        'Ciudad Arce'
                    ]
                ],
                [
                    'name' => 'La Libertad Oeste',
                    'districts' => [
                        'Colón',
                        'Jayaque',
                        'Sacacoyo',
                        'Tepecoyo',
                        'Talnique'
                    ]
                ],
                [
                    'name' => 'La Libertad Este',
                    'districts' => [
                        'Antiguo Cuscatlán',
                        'Huizúcar',
                        'Nuevo Cuscatlán',
                        'San José Villanueva',
                        'Zaragoza'
                    ]
                ],
                [
                    'name' => 'La Libertad Costa',
                    'districts' => [
                        'Chiltiupán',
                        'Jicalapa',
                        'La Libertad',
                        'Tamanique',
                        'Teotepeque'
                    ]
                ],
                [
                    'name' => 'La Libertad Sur',
                    'districts' => [
                        'Santa Tecla',
                        'Comasagua'
                    ]
                ]
            ],
        ],
        [
            'name' => 'La Paz',
            'towns' => [
                [
                    'name' => 'La Paz Oeste',
                    'districts' => [
                        'Cuyultitán',
                        'Olocuilta',
                        'San Juan Talpa',
                        'San Luis Talpa',
                        'San Pedro Masahuat',
                        'Tapalhuaca',
                        'San Francisco Chinameca'
                    ]
                ],
                [
                    'name' => 'La Paz Centro',
                    'districts' => [
                        'El Rosario',
                        'Jerusalén',
                        'Mercedes La Ceiba',
                        'Paraíso de Osorio',
                        'San Antonio Masahuat',
                        'San Emigdio',
                        'San Juan Tepezontes',
                        'San Luis La Herradura',
                        'San Miguel Tepezontes',
                        'San Pedro Nonualco',
                        'Santa María Ostuma',
                        'Santiago Nonualco'
                    ]
                ],
                [
                    'name' => 'La Paz Este',
                    'districts' => [
                        'San Juan Nonualco',
                        'San Rafael Obrajuelo',
                        'Zacatecoluca'
                    ]
                ]
            ],
        ],
        [
            'name' => 'La Unión',
            'towns' => [
                [
                    'name' => 'La Unión Norte',
                    'districts' => [
                        'Anamorós',
                        'Bolívar',
                        'Concepción de Oriente',
                        'El Sauce',
                        'Lislique',
                        'Nueva Esparta',
                        'Pasaquina',
                        'Polorós',
                        'San José',
                        'Santa Rosa de Lima'
                    ]
                ],
                [
                    'name' => 'La Unión Sur',
                    'districts' => [
                        'Conchagua',
                        'El Carmen',
                        'Intipucá',
                        'La Unión',
                        'Meanguera del Golfo',
                        'San Alejo',
                        'Yayantique',
                        'Yucuaiquín'
                    ]
                ]
            ],
        ],
        [
            'name' => 'Morazán',
            'towns' => [
                [
                    'name' => 'Morazán Norte',
                    'districts' => [
                        'Arambala',
                        'Cacaopera',
                        'Corinto',
                        'El Rosario',
                        'Joateca',
                        'Jocoaitique',
                        'Meanguera',
                        'Perquín',
                        'San Fernando',
                        'San Isidro',
                        'Torola'
                    ]
                ],
                [
                    'name' => 'Morazán Sur',
                    'districts' => [
                        'Chilanga',
                        'Delicias de Concepción',
                        'El Divisadero',
                        'Gualococti',
                        'Guatajiagua',
                        'Jocoro',
                        'Lolotiquillo',
                        'Osicala',
                        'San Carlos',
                        'San Francisco Gotera',
                        'San Simón',
                        'Sensembra',
                        'Sociedad',
                        'Yamabal',
                        'Yoloaiquín'
                    ]
                ]
            ],
        ],
        [
            'name' => 'San Miguel',
            'towns' => [
                [
                    'name' => 'San Miguel Norte',
                    'districts' => [
                        'Ciudad Barrios',
                        'Sesori',
                        'Nuevo Edén de San Juan',
                        'San Gerardo',
                        'San Luis de la Reina',
                        'Carolina',
                        'San Antonio',
                        'Chapeltique'
                    ]
                ],
                [
                    'name' => 'San Miguel Centro',
                    'districts' => [
                        'San Miguel',
                        'Comacarán',
                        'Uluazapa',
                        'Moncagua',
                        'Quelepa',
                        'Chirilagua'
                    ]
                ],
                [
                    'name' => 'San Miguel Oeste',
                    'districts' => [
                        'Chinameca',
                        'El Tránsito',
                        'Lolotique',
                        'Nueva Guadalupe',
                        'San Jorge',
                        'San Rafael Oriente'
                    ]
                ]
            ],
        ],
        [
            'name' => 'San Salvador',
            'towns' => [
                [
                    'name' => 'San Salvador Norte',
                    'districts' => [
                        'Aguilares',
                        'El Paisnal',
                        'Guazapa'
                    ]
                ],
                [
                    'name' => 'San Salvador Oeste',
                    'districts' => [
                        'Apopa',
                        'Nejapa'
                    ]
                ],
                [
                    'name' => 'San Salvador Este',
                    'districts' => [
                        'Cuscatancingo',
                        'Ciudad Delgado',
                        'Ilopango',
                        'San Martín',
                        'Soyapango',
                        'Tonacatepeque'
                    ]
                ],
                [
                    'name' => 'San Salvador Centro',
                    'districts' => [
                        'Ayutuxtepeque',
                        'Mejicanos',
                        'San Marcos',
                        'San Salvador',
                        'Santo Tomás',
                        'Santiago Texacuangos'
                    ]
                ],
                [
                    'name' => 'San Salvador Sur',
                    'districts' => [
                        'Panchimalco',
                        'Rosario de Mora'
                    ]
                ]
            ],
        ],
        [
            'name' => 'San Vicente',
            'towns' => [
                [
                    'name' => 'San Vicente Norte',
                    'districts' => [
                        'Apastepeque',
                        'Santa Clara',
                        'San Ildefonso',
                        'San Esteban Catarina',
                        'San Sebastián',
                        'San Lorenzo',
                        'Santo Domingo'
                    ]
                ],
                [
                    'name' => 'San Vicente Sur',
                    'districts' => [
                        'San Vicente',
                        'Guadalupe',
                        'San Cayetano Istepeque',
                        'Tecoluca',
                        'Tepetitán',
                        'Verapaz'
                    ]
                ]
            ],
        ],
        [
            'name' => 'Santa Ana',
            'towns' => [
                [
                    'name' => 'Santa Ana Norte',
                    'districts' => [
                        'Masahuat',
                        'Metapán',
                        'Santa Rosa Guachipilín',
                        'Texistepeque'
                    ]
                ],
                [
                    'name' => 'Santa Ana Centro',
                    'districts' => [
                        'Santa Ana'
                    ]
                ],
                [
                    'name' => 'Santa Ana Este',
                    'districts' => [
                        'Coatepeque',
                        'El Congo'
                    ]
                ],
                [
                    'name' => 'Santa Ana Oeste',
                    'districts' => [
                        'Candelaria de la Frontera',
                        'Chalchuapa',
                        'El Porvenir',
                        'San Antonio Pajonal',
                        'San Sebastián Salitrillo',
                        'Santiago de la Frontera'
                    ]
                ]
            ],
        ],
        [
            'name' => 'Sonsonate',
            'towns' => [
                [
                    'name' => 'Sonsonate Norte',
                    'districts' => [
                        'Juayúa',
                        'Nahuizalco',
                        'Salcoatitán',
                        'Santa Catarina Masahuat'
                    ]
                ],
                [
                    'name' => 'Sonsonate Centro',
                    'districts' => [
                        'Sonsonate',
                        'Sonzacate',
                        'Nahulingo',
                        'San Antonio del Monte',
                        'Santo Domingo de Guzmán'
                    ]
                ],
                [
                    'name' => 'Sonsonate Este',
                    'districts' => [
                        'Armenia',
                        'Caluco',
                        'Cuisnahuat',
                        'Izalco',
                        'San Julián',
                        'Santa Isabel Ishuatán'
                    ]
                ],
                [
                    'name' => 'Sonsonate Oeste',
                    'districts' => [
                        'Acajutla'
                    ]
                ]
            ],
        ],
        [
            'name' => 'Usulután',
            'towns' => [
                [
                    'name' => 'Usulután Norte',
                    'districts' => [
                        'Santiago de María',
                        'Alegría',
                        'Berlín',
                        'Mercedes Umaña',
                        'Jucuapa',
                        'El Triunfo',
                        'Estanzuelas',
                        'San Buenaventura',
                        'Nueva Granada'
                    ]
                ],
                [
                    'name' => 'Usulután Este',
                    'districts' => [
                        'Usulután',
                        'Jucuarán',
                        'San Dionisio',
                        'Concepción Batres',
                        'Santa María',
                        'Ozatlán',
                        'Tecapán',
                        'Santa Elena',
                        'California',
                        'Ereguayquín',
                    ]
                ],
                [
                    'name' => 'Usulután Oeste',
                    'districts' => [
                        'Jiquilisco',
                        'Puerto El Triunfo',
                        'San Agustín',
                        'San Francisco Javier'
                    ]
                ]
            ]
        ]
        ]);

        State::factory(count($states))->sequence(fn ($sequence) => [
            'name' => $states[$sequence->index]['name']
        ])->create()->each(function ($state) use ($states) {
            $towns = collect($states->where('name', $state->name)->first()['towns']);
            Town::factory(count($towns))->sequence(fn ($sequence) => [
                'name' => $towns[$sequence->index]['name'],
                'state_id' => $state->id
            ])->create()->each(function ($town) use ($towns) {
                $districts = $towns->where('name', $town->name)->first()['districts'];
                District::factory(count($districts))->sequence(fn ($sequence) => [
                    'name' => $districts[$sequence->index],
                    'town_id' => $town->id
                ])->create();
            });
        });
    }
}
