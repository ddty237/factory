<?php

namespace App\Http\Controllers;

use App\Exports\ClientsExport;
use App\Models\Ville;
use App\Models\Client;
use App\Models\Categorie;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Maatwebsite\Excel\Facades\Excel;

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
            'compte_auxilliaire' => ['required', 'string', 'unique:clients'],
            'reference_titre' => ['required', 'string'],
            'email' => ['nullable', 'string', 'email', 'max:255', 'unique:clients']
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
            'email' => $request->email,
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
            'email' => ['nullable', 'string', 'email', 'max:255']
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
            'email' => $request->email,
            'phone' => $request->phone,
            'secondary_phone' => $request->secondary_phone,
            'compte_auxilliaire' => $request->compte_auxilliaire,
            'categorie_id' => $request->categorie,
            'website' => $request->website,
            'scan_titre' => $fileName,
            'reference_titre' => $request->reference_titre,
            'user_id' => Auth::user()->id
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

    public function exportClient(Client $client, Ville $ville)
    {
        $client = $client;
        $ville = $ville;

        return view('client.invoice',compact('client','ville'));
    }

    public function downloadClient(Client $client)
    {
        $client = $client;

        //telechargement en format pdf
        $pdf = app('dompdf.wrapper');
        $pdf->loadView('client.invoice',['client'=>$client]);
        return $pdf->download('fiche-client.pdf');
    }

    public function import()
    {
        dd('Importing...');
    }

    public function showImport()
    {
        return view('client.import');
    }

    public function export()
    {
        return Excel::download(new ClientsExport, 'clients.xlsx');
    }

}
