<?php

namespace App\Http\Livewire;

use App\Models\Client;
use App\Models\DataFacturation;
use App\Models\Product;
use Livewire\Component;
use App\Models\SubProduct;
use Illuminate\Http\Request;
use App\Models\SubproductObservation;

class ProductSelectSubProduct extends Component
{
    public $produitId = '1';
    public $clientId = '1';
    public $montantTotal = 0;
    public $reference = '';
    public $datas;

    /*protected $rules = [
        'datas.*.montant' => 'required|numeric',
        'datas.*.observation' => 'required|string|max:500',
        'datas.*.total' => 'required|numeric'
    ];*/

    public function mount()
    {
        $produits = Product::all();
        $clients = Client::all();
        $this->produits = $produits;
        $this->clients = $clients;
    }

    public function save(Request $request)
    {
        //$this->validate();
        $datas = $this->datas;
        $subproducts = SubProduct::where('product_id',$this->produitId)->get();

        if(!$datas == NULL){

            $produitData = DataFacturation::create([
                'client_id' => $this->clientId,
                'product_id' => $this->produitId,
                'montant_facture' => $this->montantTotal,
                'observation_general' => NULL,
                'reference_contrat' => $this->reference,
                'scan_donnee' => NULL,
                'scan_contrat' => NULL
            ]);

            for($i = 0; $i < count($datas); $i++){
                $observation = SubproductObservation::create([
                    'product_sub_categorie_id' => $subproducts[$i]->id,
                    'product_id' => $this->produitId,
                    'observation' => $datas[$i]['observation'],
                    'montant' => $datas[$i]['montant'],
                    'data_facturation_id' => $produitData->id
                ]);
            }
            return view('BillingData.index');
        }else{
            $produitData = DataFacturation::create([
                'client_id' => $this->clientId,
                'product_id' => $this->produitId,
                'montant_facture' => $this->montantTotal,
                'observation_general' => NULL,
                'reference_contrat' => NULL,
                'scan_donnee' => NULL,
                'scan_contrat' => NULL
            ]);
            return view('BillingData.index');
        }
    }

    public function render()
    {
        $total = 0;
        if(!$this->datas == NULL){
            if(!$this->datas == NULL){
                for($i = 0; $i < count($this->datas); $i++){
                    $total += intval($this->datas[$i]['montant']);
                }
                $this->montantTotal = intval($total);
            }else{
                $this->montantTotal;
            }
        }
        $subproducts = SubProduct::where('product_id',$this->produitId)->get();
        return view('livewire.product-select-sub-product', [
            'subproducts' => $subproducts,
        ]);
    }
}
