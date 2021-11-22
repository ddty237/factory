<?php

namespace App\Http\Controllers;

use App\Models\Client;
use App\Models\Categorie;
use App\Models\Ville;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;

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
        $villes = Ville::all();
        return view('client.create',compact('categories','villes'));
    }

    public function store(Request $request)
    {
        $userId = Auth::user()->id;

        $request->validate([
            'designation' => ['required', 'string'],
            'ville' => ['required', 'integer'],
            'phone' => ['required', 'numeric'],
            'compte_auxilliaire' => ['required', 'string'],
            'reference_titre' => ['required', 'string', 'unique:clients'],
        ]);

        $DirName = 'titreClient';
        $file = $request->file('scan_titre');
        $fileDetails = $request->scan_titre;
        $fileName = $this->imageStorage($DirName,$file,$fileDetails);

        Client::create([
            'designation' => $request->designation,
            'ville_id' => $request->ville,
            'code_postal' => $request->code_postal,
            'adresse' => $request->adresse,
            'phone' => $request->phone,
            'secondary_phone' => $request->secondary_phone,
            'compte_auxilliaire' => $request->compte_auxilliaire,
            'categorie_id' => $request->categorie,
            'website' => $request->website,
            'scan_titre' => $fileName,
            'reference_titre' => $request->reference_titre,
            'user_id' => $userId
        ]);

        return redirect('client/create')->with('success','Votre client a été enregistré avec succès.');
    }

    public function show(Client $client, Ville $ville)
    {
        $client = $client;
        $ville = $ville;
        return view('client.show',compact('client','ville'));
    }

    public function edit(Client $client)
    {
        $categories = Categorie::all();
        $villes = Ville::all();
        return view('client.edit',compact('client','categories','villes'));
    }

    public function update(Request $request, Client $client)
    {
        $request->validate([
            'designation' => ['required', 'string'],
            'ville' => ['required', 'integer'],
            'phone' => ['required', 'numeric'],
            'compte_auxilliaire' => ['required', 'string'],
            'reference_titre' => ['required', 'string'],
        ]);

        Storage::delete([$client->scan_titre, '']);

        $DirName = 'titreClient';
        $file = $request->file('scan_titre');
        $fileDetails = $request->scan_titre;
        $fileName = $this->imageStorage($DirName,$file,$fileDetails);

        $client = Client::where('id',$client->id)->update([
            'designation' => $request->designation,
            'ville_id' => $request->ville,
            'code_postal' => $request->code_postal,
            'adresse' => $request->adresse,
            'phone' => $request->phone,
            'secondary_phone' => $request->secondary_phone,
            'compte_auxilliaire' => $request->compte_auxilliaire,
            'categorie_id' => $request->categorie,
            'website' => $request->website,
            'scan_titre' => $fileName,
            'reference_titre' => $request->reference_titre,
            'user_id' => $userId
        ]);

        return redirect('client')->with('success','Votre client a été modifier avec succès.');
    }

    public function imageStorage($dirName, $file, $fileDetails)
    {
        if(is_file($file)){
            $DirPath = 'public/' . $dirName;
            if (!Storage::exists($DirPath)) {
                Storage::makeDirectory($DirPath);
            }
            $imageName = time() . '.' . $fileDetails->extension();
            $path = $file->storeAs($DirPath, $imageName);
            return $path;
        }else{
            return NULL;
        }
    }
}
