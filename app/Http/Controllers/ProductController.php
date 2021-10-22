<?php

namespace App\Http\Controllers;

use App\Models\Direction;
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
        $directions = Direction::all();
        return view('produit.create',compact('directions'));
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
            'direction_id' => $request->direction,
            'montant' => $request->montant
        ]);

        $product->save();
        return redirect('produit')->with('message','Votre produit a été enregistré avec succès');
    }

    public function show(Product $product)
    {
        $product = $product;
        return view('produit.show', compact('product'));
    }

    public function edit()
    {
        return view('produit.edit');
    }
}
