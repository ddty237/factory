<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RecoveryController extends Controller
{
    public function index()
    {
        return view('Recouvrement.index');
    }

    public function create()
    {
        return view('Recouvrement.create');
    }

    public function store()
    {
        //
    }

}
