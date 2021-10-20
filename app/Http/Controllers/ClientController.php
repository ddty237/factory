<?php

namespace App\Http\Controllers;

use App\Models\Categorie;
use App\Models\Client;
use App\Models\Delegation;
use Illuminate\Http\Request;

use function PHPSTORM_META\map;

class ClientController extends Controller
{
    public function index()
    {
        $clients = Client::all();
        return view('client.index',compact('clients'));
    }

    public function create()
    {
        $categories = Categorie::all();
        $delegations = Delegation::all();
        return view('client.create',compact('categories','delegations'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'designation' => ['required'],
            'delegation' => ['required'],
            'code_postal' => ['nullable'],
            'adresse' => ['nullable'],
            'phone' => ['required'],
            'compte_auxilliaire' => ['nullable'],
            'categorie' => ['required'],
            'scan_titre' => ['nullable'],
            'reference_titre' => ['required']
        ]);

        $client = Client::create([
            'designation' => $request->designation,
            'delegation_id' => $request->delegation,
            'code_postal' => $request->code_postal,
            'adresse' => $request->adresse,
            'phone' => $request->phone,
            'secondary_phone' => $request->secondary_phone,
            'compte_auxilliaire' => $request->compte_auxilliaire,
            'categorie_id' => $request->categorie,
            'website' => $request->website,
            'scan_titre' => $request->scan_titre,
            'reference_titre' => $request->reference_titre,
        ]);

        $client->save();
        return back();
    }

    public function show(Client $client)
    {
        $client =$client;
        return view('client.show',compact('client'));
    }

    public function edit()
    {
        return view('client.edit');
    }

    public function update(Request $request)
    {
        $request->validate([
            'designation' => ['required'],
            'delegation' => ['nullable'],
            'code_postal' => ['nullable'],
            'adresse' => ['nullable'],
            'phone' => ['nullable'],
            'compte_auxilliaire' => ['nullable'],
            'categorie' => ['nullable'],
            'scan_titre' => ['nullable'],
            'reference_titre' => ['nullable']
        ]);



    }
}
