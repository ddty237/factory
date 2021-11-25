<?php

namespace App\Http\Livewire;

use App\Models\Client;
use App\Models\DataFacturation;
use App\Models\Product;
use Livewire\Component;
use App\Models\SubProduct;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\SubproductObservation;

class ProductSelectSubProduct extends Component
{
    public $produitId = '1';
    public $clientId = '1';
    public $montantTotal;
    public $datas;
    public $total = 0;

    protected $rules = [
        'datas.*.montant' => 'required|numeric',
        'datas.*.observation' => 'required|string|max:500',
        'datas.*.total' => 'required|numeric'
    ];

    public function mount()
    {
        $produits = Product::all();
        $clients = Client::all();
        $this->produits = $produits;
        $this->clients = $clients;
        $total = $this->total;
        if(!$this->datas == NULL){
            for($i = 0; $i < count($this->datas); $i++){
                $total = $total + intval($this->datas[$i]['montant']);
            }
        }
    }

    public function save(Request $request)
    {
        $this->validate();
        $datas = $this->datas;
        $produitId = $this->produitId;
        $clientId = $this->clientId;

        if(!$datas == NULL){

            DataFacturation::create([
                'client_id' => $clientId,
                'product_id' => $produitId,
                'montant_facture' => $this->montantTotal,
                'observation_general' => ''
            ]);

            for($i = 0; $i < count($datas); $i++){
                $observation = SubproductObservation::create([
                    'product_sub_categorie_id' => 0,
                    'product_id' => $produitId,
                    'data_facturation_id' => 0,
                    'observation' => $datas[$i]['observation'],
                    'montant' => $datas[$i]['montant'],
                ]);
            }
        }
    }

    public function render()
    {

        $subproducts = SubProduct::where('product_id',$this->produitId)->get();
        return view('livewire.product-select-sub-product', [
            'subproducts' => $subproducts,
        ]);
    }
}
