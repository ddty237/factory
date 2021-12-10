<?php

namespace App\Http\Livewire;

use App\Models\Client;
use App\Models\Product;
use Livewire\Component;
use App\Models\SubProduct;
use App\Models\DataFacturation;
use Illuminate\Support\Facades\Auth;
use App\Models\SubproductObservation;

class ProductSelectSubProduct extends Component
{
    public $produitId = '1';
    public $clientId = '1';
    public $montantTotal = 0;
    public $reference;
    public $general_observation;
    public $datas;

    public function mount()
    {
        $produits = Product::all();
        $clients = Client::all();
        $this->produits = $produits;
        $this->clients = $clients;
    }

    public function save()
    {
        $datas = $this->datas;
        $reference = $this->reference;
        $general_observation = $this->general_observation;
        $subproducts = SubProduct::where('product_id',$this->produitId)->get();

        if(!$datas == NULL){

            $produitData = DataFacturation::create([
                'client_id' => $this->clientId,
                'product_id' => $this->produitId,
                'montant_facture' => $this->montantTotal,
                'observation_general' => $general_observation ?? NULL,
                'reference_contrat' => $reference,
                'scan_donnee' => NULL,
                'scan_contrat' => NULL,
                'user_id' => Auth::user()->id
            ]);

            for($i = 0; $i < count($datas); $i++){
                $observation = SubproductObservation::create([
                    'product_sub_categorie_id' => $subproducts[$i]->id,
                    'product_id' => $this->produitId,
                    'observation' => $datas[$i]['observation'] ?? NULL,
                    'montant' => $datas[$i]['montant'],
                    'data_facturation_id' => $produitData->id
                ]);
            }

            return redirect('billingData');

        }else{
            $produitData = DataFacturation::create([
                'client_id' => $this->clientId,
                'product_id' => $this->produitId,
                'montant_facture' => $this->montantTotal,
                'observation_general' => $general_observation ?? NULL,
                'reference_contrat' => $reference,
                'scan_donnee' => NULL,
                'scan_contrat' => NULL,
                'user_id' => Auth::user()->id
            ]);

            return redirect('billingData');
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
