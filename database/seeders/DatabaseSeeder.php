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
        /*DB::table('villes')->insert([
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
        ]);*/

        DB::table('delegations')->insert([
            ['name' => 'Délégation Régionale de Yaoundé'],
            ['name' => 'Délégation Régionale de Douala'],
            ['name' => 'Délégation Régionale de Garoua'],
            ['name' => 'Délégation Régionale de Bamenda']
        ]);

       /*

        , , , , , , , , , Messondo, Mfou, Minta, Monatélé
        N
        Nanga-Eboko, Ndikiniméki, Ngambè-Tikar, Ngog-Mapubi, Ngomedzap, Ngoro, Ngoumou, Nguibassal, Nitoukou, Nkolafamba, Nkolmetet, Nkoteng, Nsem, Ntui
        O
        Obala, Okola, Olanguina, Ombessa
        S
        Sa'a, Soa
        */
        DB::table('villes')->insert([
            ['name' => 'Yaoundé', 'delegation_id' => 1],
            ['name' => 'Douala', 'delegation_id' => 2],
            ['name' => 'Garoua', 'delegation_id' => 3],
            ['name' => 'Bamenda', 'delegation_id' => 4],
            ['name' => 'Ebolowa', 'delegation_id'=> 1],
            ['name' =>'Bertoua', 'delegation_id' => 1],
            ['name' =>'Maroua', 'delegation_id' => 3],
            ['name' =>'Ngaoundéré', 'delegation_id' => 3],
            ['name' =>'Buea', 'delegation_id' => 4],
            ['name' => 'Afanloum', 'delegation_id' => 1],
            ['name' => 'Akoeman', 'delegation_id' => 1],
            ['name' => 'Akono', 'delegation_id' => 1],
            ['name' => 'Akonolinga', 'delegation_id' => 1],
            ['name' => 'Awaé', 'delegation_id' => 1],
            ['name' => 'Ayos', 'delegation_id' => 1],
            ['name' => 'Bafia', 'delegation_id' => 1],
            ['name' => 'Batchenga', 'delegation_id' => 1],
            ['name' => 'Bibey', 'delegation_id' => 1],
            ['name' => 'Bikok', 'delegation_id' => 1],
            ['name' => 'Biyouha', 'delegation_id' => 1],
            ['name' => 'Bokito', 'delegation_id' => 1],
            ['name' => 'Bondjock', 'delegation_id' => 1],
            ['name' => 'Bot-Makak', 'delegation_id' => 1],
            ['name' => 'Deuk', 'delegation_id' => 1],
            ['name' => 'Dibang', 'delegation_id' => 1],
            ['name' => 'Dzeng', 'delegation_id' => 1],
            ['name' => 'Ebebda', 'delegation_id' => 1],
            ['name' => 'Edzendouan', 'delegation_id' => 1],
            ['name' => 'Elig-Mfomo', 'delegation_id' => 1],
            ['name' => 'Endom', 'delegation_id' => 1],
            ['name' => 'Esse', 'delegation_id' => 1],
            ['name' => 'Evodoula', 'delegation_id' => 1],
            ['name' => 'Kiiki', 'delegation_id' => 1],
            ['name' => 'Kobdombo', 'delegation_id' => 1],
            ['name' => 'Kon-Yambetta', 'delegation_id' => 1],
            ['name' => 'Lembe-Yezoum', 'delegation_id' => 1],
            ['name' => 'Lobo', 'delegation_id' => 1],
            ['name' => 'Makak', 'delegation_id' => 1],
            ['name' => 'Makénéné', 'delegation_id' => 1],
            ['name' => 'Matomb', 'delegation_id' => 1],
            ['name' => 'Mbalmayo', 'delegation_id' => 1],
            ['name' => 'Mbandjock', 'delegation_id' => 1],
            ['name' => 'Mbangassina', 'delegation_id' => 1],
            ['name' => 'Mbankomo', 'delegation_id' => 1],
            ['name' => 'Mengang', 'delegation_id' => 1],
            ['name' => 'Mengueme', 'delegation_id' => 1],
            ['name' => 'Yoko', 'delegation_id' => 1],
        ]);

        DB::table('directions')->insert([
            ['name' => 'Direction du Recouvrement'],
            ['name' => 'Direction Technique'],
            ['name' => 'Direction de la Gestion des Fréquences'],
            ['name' => 'La Direction des Licences, de la Concurrence et de l\'Interconnexion'],
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

        DB::table('roles')->insert([
            ['name' => 'DO'],
            ['name' => 'DREC'],
            ['name' => 'DR']
        ]);
    }
}
