<?php

namespace App\Http\Controllers;

use App\Models\Client;
use App\Models\Product;
use Illuminate\Http\Request;

class BillingDataController extends Controller
{
    public function index()
    {
        return view('BillingData.index');
    }

    public function create()
    {
        $clients = Client::all();
        $produits = Product::all();
        return view('BillingData.create', compact('clients','produits'));
    }

    public function store()
    {
        //
    }

    public function show()
    {
        return view('BillingData.show');
    }

    public function edit()
    {
        return view('BillingData.edit');
    }

    public function update()
    {
        //
    }
}
