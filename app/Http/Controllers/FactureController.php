<?php

namespace App\Http\Controllers;

use App\Models\Facture;
use App\Models\RarnProduct;
use Illuminate\Http\Request;
use App\Models\DataFacturation;
use NumberToWords\NumberToWords;
use Illuminate\Support\Facades\DB;

class FactureController extends Controller
{
    public function index()
    {
        $factures = Facture::get()->map(function($item, $key){
            $data = [
                'id' => $item->id,
                'numero_facture' => $item->numero_facture,
                'client' => $item->data_facturation->map(function($client,$key){
                    $data = ['name' => $client->client->designation];
                    return $data;
                }),
                'produit' => $item->data_facturation->map(function($produit,$key){
                    $data = ['name' => $produit->product->name];
                    return $data;
                }),
                'status' => $item->status->name
            ];
            return $data;
        });

        return view('facture.index', compact('factures'));
    }

    public function create()
    {
        $datas = DataFacturation::where('invoice_generate',false)->get();
        return view('facture.create',compact('datas'));
    }

    public function genererFacture(Request $request, $data)
    {
        $donnees = DataFacturation::where('id',$data)->get()->map(function($item, $key){
            $data = [
                'client' => $item->client->designation,
                'delegation' => $item->client->ville->delegation->nickname,
                'product' => $item->product->name,
                'direction' => $item->product->direction->name,
                'montant_total' => $item->montant_facture,
                'observation_general' => $item->observation_general,
                'observations' => $item->observations->map(function($obs, $key){
                    $data = [
                        'observation' => $obs->observation,
                        'montant' => $obs->montant
                    ];
                    return $data;
                })
            ];
            return $data;
        });

        $anneeEnCours = date('Y');
        $nomProduit = $donnees[0]['product'];
        $delegation = $donnees[0]['delegation'];
        $direction = $donnees[0]['direction'];
        $subYear = substr(strval($anneeEnCours),2);

        $ids = DB::table('factures')->latest()->first('numero_facture');

        if($ids != null) {
            if (str_ends_with($ids->numero_facture, 'bis')) {
                $new_ids = substr(strrev($ids->numero_facture), 3);
                $final_ids = strrev(substr($new_ids, 0, 3));
            }else{
                $rev_ids = strrev($ids->numero_facture);
                $final_ids = strrev(substr($rev_ids, 0, 3));
            }
        }else{
            $rev_ids = null;
            $final_ids = NULL;
        }

        if($final_ids === NULL){
            $latest = str_pad(1,3,'0',STR_PAD_LEFT);
        }else{
            $latest = $final_ids + 1;
            $latest = str_pad($latest,3,'0',STR_PAD_LEFT);
        }

        $numeroFacture = $subYear.'-'.$nomProduit.'/'.$delegation.'/'.$latest;

        Facture::create([
            'numero_facture' => $numeroFacture,
            'data_facturation_id' => $data,
            'periode' => date('M-Y'),
            'arriere' => '',
            'status_id' => 1,
        ]);

        /*if($direction == "Direction de la Gestion des Fréquences" || $nomProduit == 'RARN'){
            $numeroFacture = $numeroFacture.'bis';
            Facture::create([
                'numero_facture' => $numeroFacture,
                'data_facturation_id' => $data,
                'periode' => date('M-Y'),
                'arriere' => '',
                'status_id' => 1,
            ]);
        }*/

        DataFacturation::where('id',$data)->update([
            'invoice_generate' => true
        ]);

        return back();
    }

    public function store(Request $request)
    {
        //
    }

    public function show()
    {
        //
    }

    public function exportFacture(Facture $data)
    {
        $donnees = DataFacturation::where('id',$data->data_facturation_id)->get()->map(function($item, $key){
            $data = [
                'client' => $item->client->designation,
                'code_postal' => $item->client->code_postal,
                'telephone' => $item->client->phone,
                'telephone2' => $item->client->secondary_phone,
                'ville' => $item->client->ville->name,
                'reference_contrat' => $item->reference_contrat,
                'delegation' => $item->client->ville->delegation->name,
                'abbr_delegation' => $item->client->ville->delegation->nickname,
                'product_name' => $item->product->name,
                'product_description' => $item->product->description,
                'imputation_budgetaire' => $item->product->imputation_budgetaire,
                'compte_collectif' => $item->product->compte_collectif,
                'compte_auxilliaire' => $item->client->compte_auxilliaire,
                'direction' => $item->product->direction->name,
                'created_at' => $item->created_at->format('d-m-Y'),
                'montant_total' => $item->montant_facture,
                'observation_general' => $item->observation_general,
                'observations' => $item->rarns->map(function($obs, $key){
                    $data = [
                        'subproduct_name' => $obs->bloc_numero,
                        'quantite' => $obs->quantites,
                        'format' => $obs->nameRarnProduct->format,
                        'type' => $obs->nameRarnProduct->type_numero,
                        'montant' => $obs->nameRarnProduct->redevance_attribution_annuel,
                    ];
                    return $data;
                }),
                'frais' => $item->frais->map(function($frais, $key){
                    $data = [
                        'frais_name' => $frais->name,
                        'frais_description' => $frais->description,
                        'frais_montant' => $frais->montant
                    ];
                    return $data;
                })
            ];
            return $data;
        });

        //dd($donnees);

        $numberToWords = new NumberToWords();
        $numberTransformer = $numberToWords->getNumberTransformer('fr');
        $montant_chiffre = $numberTransformer->toWords($donnees[0]['montant_total']);
        $frais_chiffre = $numberTransformer->toWords($donnees[0]['frais'][0]['frais_montant']);
        //prévisualiser le PDF
        $pdf = app('dompdf.wrapper');
        $pdf->loadView('facture.invoice',['facture' =>$data,'donnees' => $donnees, 'montant_chiffre' => $montant_chiffre, 'frais_chiffre' => $frais_chiffre]);

        return $pdf->stream();
    }

    public function downloadFacture(Facture $data)
    {
        $donnees = DataFacturation::where('id',$data->data_facturation_id)->get()->map(function($item, $key){
            $data = [
                'client' => $item->client->designation,
                'code_postal' => $item->client->code_postal,
                'telephone' => $item->client->phone,
                'telephone2' => $item->client->secondary_phone,
                'ville' => $item->client->ville->name,
                'reference_contrat' => $item->reference_contrat,
                'delegation' => $item->client->ville->delegation->name,
                'abbr_delegation' => $item->client->ville->delegation->nickname,
                'product_name' => $item->product->name,
                'product_description' => $item->product->description,
                'imputation_budgetaire' => $item->product->imputation_budgetaire,
                'compte_collectif' => $item->product->compte_collectif,
                'compte_auxilliaire' => $item->client->compte_auxilliaire,
                'direction' => $item->product->direction->name,
                'created_at' => $item->created_at->format('d-m-Y'),
                'montant_total' => $item->montant_facture,
                'observation_general' => $item->observation_general,
                'observations' => $item->observations->map(function($obs, $key){
                    $data = [
                        'subproduct_name' => $obs->subProduct->product_description,
                        'observation' => $obs->observation,
                        'montant' => $obs->montant
                    ];
                    return $data;
                })
            ];
            return $data;
        });
        $numberToWords = new NumberToWords();
        $numberTransformer = $numberToWords->getNumberTransformer('fr');
        $montant_chiffre = $numberTransformer->toWords($donnees[0]['montant_total']);

        //télécharger le PDF
        $pdf = app('dompdf.wrapper');
        $pdf->loadView('facture.invoice',['facture' =>$data,'donnees' => $donnees, 'montant_chiffre' => $montant_chiffre]);

        return $pdf->download(str_pad($data->id,3,'0',STR_PAD_LEFT).'.pdf');
    }
}
