<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BillingDataController extends Controller
{
    public function index()
    {
        return view('BillingData.index');
    }

    public function create()
    {
        return view('BillingData.create');
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
