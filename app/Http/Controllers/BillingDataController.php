<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\DataFacturation;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class BillingDataController extends Controller
{
    public function index()
    {
        $datas = DataFacturation::all();
        return view('BillingData.index', compact('datas'));
    }

    public function create(Request $request)
    {
        return view('BillingData.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'client_id' => ['required'],
            'product_id' => ['required'],
            'observation_general' => ['nullable'],
        ]);
    }

    public function show($id)
    {
        $data = DataFacturation::findOrfail($id);
        return view('BillingData.show', compact('data'));
    }

    public function edit()
    {
        return view('BillingData.edit');
    }

    public function update()
    {
        //
    }

    public function createFile($id)
    {
        $data = DataFacturation::findOrfail($id);
        return view('BillingData.CreateFile',compact('data'));
    }

    public function storeFile(Request $request, $id)
    {
        $contrat = $request->file('scan_contrat');
        $donnee = $request->file('scan_donnee');
        $data = DataFacturation::findOrfail($id);
        $pathContrat = $contrat ? $contrat->storeAs('public/contrat',time() .'contrat'.'.'.$contrat->extension()) : NULL;
        $pathDonnee = $donnee ? $donnee->storeAs('public/donnee_facturation',time() .'donnee'.'.'.$donnee->extension()) : NULL;

        DB::table('data_facturation')
            ->updateOrInsert(
                ['id' => $data->id],
                ['scan_contrat' => $pathContrat, 'scan_donnee'=> $pathDonnee]
            );

        Storage::delete([$data->scan_contrat, '']);
        Storage::delete([$data->scan_donnee, '']);
        return redirect('billingData');
    }
}
