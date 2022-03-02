<?php

namespace App\Http\Livewire;

use App\Models\Client;
use Livewire\Component;

class AgrementProduct extends Component
{
    public function mount()
    {
        // chargement des clients
        Client::all();
        // chargement des produits de type agrement
    }

    public function render()
    {
        return view('livewire.agrement-product');
    }
}
