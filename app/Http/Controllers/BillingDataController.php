<?php

namespace App\Http\Controllers;

use App\Models\DataFacturation;
use Illuminate\Http\Request;

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
}
