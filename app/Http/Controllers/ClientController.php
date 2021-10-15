<?php

namespace App\Http\Controllers;

use App\Models\Client;
use Illuminate\Http\Request;

use function PHPSTORM_META\map;

class ClientController extends Controller
{
    public function index()
    {
        $clients = Client::all();

        $headers = collect($clients->toArray()[0])->keys();

        return view('client.index',compact('clients','headers'));
    }

    public function create()
    {
        return view('client.create');
    }

    public function store(Request $request)
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

        $client = Client::create([
            'designation' => $request->designation,
            'delegation' => $request->delegation,
            'code_postal' => $request->code_postal,
            'adresse' => $request->adresse,
            'phone' => $request->phone,
            'secondary_phone' => $request->secondary_phone,
            'compte_auxilliaire' => $request->compte_auxilliaire,
            'categorie' => $request->categorie,
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
        //dd($client);
        return view('client.show',compact('client'));
    }

    public function edit()
    {

    }
}
