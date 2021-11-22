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


        /*
        +----+-------------+------------+-----------+------------+----------------+
        | ID | observation | produit_id | client_id | données_id |                |
        +----+-------------+------------+-----------+------------+----------------+
        |    |             |            |           |            |                |
        +----+-------------+------------+-----------+------------+----------------+
        */
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
