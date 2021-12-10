<?php

namespace App\Http\Controllers;

use App\Models\Facture;
use Illuminate\Http\Request;
use App\Models\DataFacturation;
use NumberToWords\NumberToWords;
use Illuminate\Support\Facades\DB;
use App\Models\SubproductObservation;

class FactureController extends Controller
{
    public function index()
    {
        // create the number to words "manager" class
        //$numberToWords = new NumberToWords();

        // build a new number transformer using the RFC 3066 language identifier
        /*$numberTransformer = $numberToWords->getNumberTransformer('fr');
        $f = $numberTransformer->toWords(51200);
        dd($f);*/
        $factures = Facture::all();
        return view('facture.index', compact('factures'));
    }

    public function create()
    {
        $datas = DataFacturation::all();
        return view('facture.create',compact('datas'));
    }

    public function genererFacture(Request $request, $data)
    {
        $donnees = DataFacturation::where('id',$data)->get()->map(function($item, $key){
            $data = [
                'client' => $item->client->designation,
                'delegation' => $item->client->ville->delegation->nickname,
                'product' => $item->product->designation,
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

        $nomClient = $donnees[0]['client'];
        $anneeEnCours = date('Y');
        $nomProduit = $donnees[0]['product'];
        $delegation = $donnees[0]['delegation'];
        $montantTotal = $donnees[0]['montant_total'];
        $observations = $donnees[0]['observations'];
        $direction = $donnees[0]['direction'];
        $subYear = substr(strval($anneeEnCours),2);

        $ids = DB::table('factures')->latest()->first('id');
        if($ids === NULL){
            $latest = 1;
        }else{
            $latest = $ids->id + 1;
        }
        $numeroFacture = $subYear.'-'.$nomProduit.'/'.$delegation.'/'.$latest;

        //dd($numeroFacture);

        Facture::create([
            'numero_facture' => $numeroFacture,
            'data_facturation_id' => $data,
            'periode' => date('M-Y'),
            'arriere' => '',
            'status_id' => 0,
        ]);

        // generer une facture sur un template PDF
        // si le produit appartient a la direction des frequences on aura une facture sur deux pages
        if($direction == "Direction de la Gestion des Fréquences" || $nomProduit == 'RARN'){
            $numeroFacture = $numeroFacture.'bis';
            Facture::create([
                'numero_facture' => $numeroFacture,
                'data_facturation_id' => $data,
                'periode' => date('M-Y'),
                'arriere' => '',
                'status_id' => 0,
            ]);
        }
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

    public function numberBill($id)
    {
        $donnee = DataFacturation::findOrfail($id);

    }
}
