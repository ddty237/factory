<?php

namespace App\Http\Livewire;

use App\Models\Client;
use App\Models\Product;
use Livewire\Component;
use App\Models\SubProduct;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\SubproductObservation;

class ProductSelectSubProduct extends Component
{
    public $produitId = '1';
    public $datas;

    protected $rules = [
        'datas.*.montant' => 'required|numeric',
        'datas.*.observation' => 'required|string|max:500',
    ];

    public function mount()
    {
        $produits = Product::all();
        $clients = Client::all();
        $this->produits = $produits;
        $this->clients = $clients;
    }

    public function save()
    {
        $this->validate();
        $datas = $this->datas;
        $produitId = $this->produitId;
        dd($produitId);

        if(!$datas == NULL){
            //dd(count($datas));
            for($i = 0; $i < count($datas); $i++){
                SubproductObservation::create([
                    'product_sub_categorie_id' => 0,
                    'produit_id' => $produitId,
                    'data_facturation_id' => 0,
                    'observation' => $datas[$i]['observation'],
                    'montant' => $datas[$i]['montant']
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
