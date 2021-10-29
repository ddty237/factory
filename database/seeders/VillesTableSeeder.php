<?php

namespace Database\Seeders;

use App\Models\Ville;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class VillesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Ville::truncate();

        $villes =  [
            [
                'name' => 'Centre',
            ],
            [
                'name' => 'Sud',
            ],
            [
                'name' => 'Est',
            ],
            [
                'name' => 'Ouest',
            ],
            [
                'name' => 'Nord-ouest',
            ],
            [
                'name' => 'Sud-ouest',
            ],
            [
                'name' => 'Adamaoua',
            ],
            [
                'name' => 'Extrème-nord',
            ],
            [
                'name' => 'Nord',
            ],
            [
                'name' => 'Littoral',
            ]
          ];

          Ville::create($villes);
    }
}
