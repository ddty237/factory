<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::all();

        return view('produit.index',compact('products'));
    }

    public function create()
    {
        return view('produit.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'designation' => ['required'],
            'description' => ['nullable'],
            'compte_collectif' => ['nullable'],
            'codification' => ['nullable'],
            'direction' => ['nullable'],
            'montant' => ['nullable']
        ]);

        $product = Product::create([
            'designation' => $request->designation,
            'description' => $request->description,
            'compte_collectif' => $request->compte_collectif,
            'codification' => $request->codification,
            'direction' => $request->direction,
            'montant' => $request->montant,
            'sub_categorie' => 'une categorie'

        ]);

        $product->save();
        return back();
    }

    public function show()
    {
        return view('produit.show');
    }

    public function edit()
    {

    }
}
