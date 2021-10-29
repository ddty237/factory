<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        DB::table('villes')->insert([
            ['name' => 'Centre'],
            ['name' => 'Sud'],
            ['name' => 'Est'],
            ['name' => 'Ouest'],
            ['name' => 'Nord-ouest'],
            ['name' => 'Sud-ouest'],
            ['name' => 'Adamaoua'],
            ['name' => 'Extrème-nord'],
            ['name' => 'Nord'],
            ['name' => 'Littoral']
        ]);

        DB::table('delegations')->insert([
            ['name' => 'Délégation Régionale de Yaoundé'],
            ['name' => 'Délégation Régionale de Douala'],
            ['name' => 'Délégation Régionale de Garoua'],
            ['name' => 'Délégation Régionale de Bamenda']
        ]);

        DB::table('directions')->insert([
            ['name' => 'Direction du Recouvrement'],
            ['name' => 'Direction Technique'],
            ['name' => 'Direction de la Gestion des Fréquences'],
            ['name' => 'Direction des Licences'],
            ['name' => 'de la Concurrence et de l’Interconnexion'],
            ['name' => 'Division des Affaires Juridiques et de la Protection du Consommateur'],
            ['name' => 'Direction des Finances'],
            ['name' => 'Cabinet'],
            ['name' => 'Délégation Régionale de Yaoundé'],
            ['name' => 'Délégation Régionale de Douala'],
            ['name' => 'Délégation Régionale de Garoua'],
            ['name' => 'Délégation Régionale de Bamenda'],
        ]);

        DB::table('postes')->insert([
            ['name' => 'Agent de Maitrise'],
            ['name' => 'Cadre d’appui'],
            ['name' => 'Chef de Bureau'],
            ['name' => 'Chef de Service'],
            ['name' => 'Sous-Directeur'],
            ['name' => 'Directeur'],
            ['name' => 'Conseiller Technique']
        ]);

        DB::table('categories')->insert([
            ['name' => 'concession'],
            ['name' => 'licence 1ère catégorie'],
            ['name' => 'licence 2ème catégorie'],
            ['name' => 'agrément'],
            ['name' => 'déclaration préalable'],
            ['name' => 'homologation'],
            ['name' => 'autres']
        ]);
    }
}
