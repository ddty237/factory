<?php

namespace App\Http\Livewire;

use App\Models\Client;
use Livewire\Component;
use App\Models\RarnProduct as ProductsRarn;
use App\Models\DataFacturation;
use App\Models\FraisProduct;
use App\Models\RarnRecapitulatives;
use Illuminate\Support\Facades\Auth;

class RarnProduct extends Component
{
    public $clients;
    public $products;
    public $orderProducts = [];
    public $reference_contrat;
    public $clientId;
    public $observation_generale;

    public function mount()
    {
        $this->clients = Client::all();
        $this->products = RarnRecapitulatives::all();
        $this->orderProducts = [
            ['produit' => '','quantity' => '','redevance' => '','range' => '','date' => '']
        ];
    }

    public function storeProduct()
    {
        // calcul du montant final de la facture
        for($i = 0; $i < count($this->orderProducts); $i++){
            $montants [] = RarnRecapitulatives::where('id', $this->orderProducts[$i] )->value($this->orderProducts[0]['redevance']) * intval($this->orderProducts[$i]['quantity']);
        }
        $montantTotal = array_sum($montants);

        $data = DataFacturation::create([
            'client_id' => $this->clientId,
            'montant_facture' => $montantTotal,
            'observation_general' => $this->observation_generale ?? '',
            'reference_contrat' => $this->reference_contrat,
            'recap_products_id' => 1,
            'scan_donnee' => NULL,
            'scan_contrat' => NULL,
            'user_id' => Auth::user()->id
        ]);

        for($i = 0; $i < count($this->orderProducts); $i++){

           $listProduct = ProductsRarn::create([
                'bloc_numero' => $this->orderProducts[$i]['range'],
                'format_id' => $this->orderProducts[$i]['produit'],
                'quantites' => $this->orderProducts[$i]['quantity'],
                'date_attribution' => $this->orderProducts[$i]['date'],
                'data_facturation_id' => $data->id
            ]);
        }

        $categorie = Client::where('id', $this->clientId)->value('categorie_id');

        $frais = FraisProduct::create([
            'name' => 'RARN',
            'description' => 'Frais annuel de gestion et de contrôle des ressources en numérotation',
            'resource_id' => $data->id,
            'montant' => $categorie === 1 ? 10000000 : 100000,
        ]);

        return redirect('billingData/create')->with('success','Votre donnée de facturation a été enregistré avec succès.');
    }

    public function addProduct()
    {
        $this->orderProducts[] = ['produit' => '','quantity' => '','redevance' => '','range' => '','date' => ''];
    }

    public function removeProduct($index)
    {
        unset($this->orderProducts[$index]);
        $this->orderProducts = array_values($this->orderProducts);
    }

    public function render()
    {
        return view('livewire.rarn-product');
    }
}
