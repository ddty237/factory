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
        DB::table('delegations')->insert([
            ['name' => 'Délégation Régionale de Yaoundé','nickname' => 'Y'],
            ['name' => 'Délégation Régionale de Douala','nickname' => 'D'],
            ['name' => 'Délégation Régionale de Garoua','nickname' => 'G'],
            ['name' => 'Délégation Régionale de Bamenda','nickname' => 'B']
        ]);

       /*

        Messondo, Mfou, Minta, Monatélé
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

        DB::table('status')->insert([
            ['name' => 'Non payée'],
            ['name' => 'Payée'],
            ['name' => 'annulée']
        ]);

        DB::table('rarn_recapitulatives')->insert([
            ['format'=> 'téléphonique','type_numero'=> 'numéro long( 9 chiffres )','redevance_attribution_annuel'=> 200,'redevance_reservation_annuel'=> 150],
            ['format'=> 'utilité publique','type_numero'=> '4 chiffres','redevance_attribution_annuel'=> 0,'redevance_reservation_annuel'=> 0],
            ['format'=> 'valeur Ajoutée','type_numero'=> '9 chiffres','redevance_attribution_annuel'=> 5000,'redevance_reservation_annuel'=> 3750],
            ['format'=> 'valeur Ajoutée','type_numero'=> '8 chiffres','redevance_attribution_annuel'=> 15000,'redevance_reservation_annuel'=> 7000],
            ['format'=> 'valeur Ajoutée','type_numero'=> '5 chiffres','redevance_attribution_annuel'=> 50000,'redevance_reservation_annuel'=> 35000],
            ['format'=> 'valeur Ajoutée','type_numero'=> '4 chiffres','redevance_attribution_annuel'=> 200000,'redevance_reservation_annuel'=> 100000],
            ['format'=> 'valeur Ajoutée','type_numero'=> '3 chiffres','redevance_attribution_annuel'=> 600000,'redevance_reservation_annuel'=> 400000],
            ['format'=> 'code USSD','type_numero'=> null,'redevance_attribution_annuel'=> 100000,'redevance_reservation_annuel'=> 50000],
            ['format'=> 'code NSPC','type_numero'=> null,'redevance_attribution_annuel'=> 300000,'redevance_reservation_annuel'=> 225000],
            ['format'=> 'code ISPC','type_numero'=> null,'redevance_attribution_annuel'=> 500000,'redevance_reservation_annuel'=> 375000],
            ['format'=> 'code identifiant de réseau mobile(code MNC)','type_numero'=> null,'redevance_attribution_annuel'=> 3000000,'redevance_reservation_annuel'=> 0],
            ['format'=> 'code identifiant de réseau de transmission de données','type_numero'=> null,'redevance_attribution_annuel'=> 2500000,'redevance_reservation_annuel'=> 0],
            ['format'=> 'indicatif national de destination','type_numero'=> 'Dédié','redevance_attribution_annuel'=> 2000000,'redevance_reservation_annuel'=> 0],
            ['format'=> 'indicatif national de destination','type_numero'=> 'partagé','redevance_attribution_annuel'=> 1000000,'redevance_reservation_annuel'=> 0],
            ['format'=> 'Terrestrial trunked radio','type_numero'=> null,'redevance_attribution_annuel'=> 500000,'redevance_reservation_annuel'=> 0],
            ['format'=> 'issue identifiers','type_numero'=> null,'redevance_attribution_annuel'=> 1500000,'redevance_reservation_annuel'=> 0],
            ['format'=> 'service d\'urgence','type_numero'=> '3 ou 4 chiffres','redevance_attribution_annuel'=> 0,'redevance_reservation_annuel'=> 0],
        ]);

        DB::table('droits_entrees_recapitulatives')->insert([
            ['type_reseau'=>'service support','montant_entree_id'=> 1,'droit_renouvellement'=> 0.05],
            ['type_reseau'=>'Réseaux pour la fourniture au public des services de communications électroniques','montant_entree_id'=> 2,'droit_renouvellement'=> 0.05],
            ['type_reseau'=>'infrastructures passives en support aux réseaux de communications électroniques','montant_entree_id'=> 3,'droit_renouvellement'=> 0.05],
            ['type_reseau'=>'Réseaux privés indépendants à l\'exclusion de ceux soumis au régime de simple déclaration','montant_entree_id'=> 4,'droit_renouvellement'=> 1000000],
            ['type_reseau'=>'Réseaux temporaires','montant_entree_id'=> 5,'droit_renouvellement'=> 0],
            ['type_reseau'=>'Réseaux expérimentaux','montant_entree_id'=> 5,'droit_renouvellement'=> 0],
        ]);

        DB::table('montant_entree')->insert([
            ['partie_fixe' => 300000,'partie_variable'=> 0],
            ['partie_fixe' => null,'partie_variable'=> 0.05],
            ['partie_fixe' => 10000000,'partie_variable'=> 0.05],
            ['partie_fixe' => 1000000,'partie_variable'=> 0],
            ['partie_fixe' => null,'partie_variable'=>null],
        ]);

        DB::table('recap_products')->insert([
            ['name'=> 'RARN', 'description'=> 'Redevance d\'attribution des ressources en numérotation', 'direction_id'=> 3 , 'imputation_budgetaire' => '710023', 'compte_collectif' => '41110300'],
        ]);
    }
}
