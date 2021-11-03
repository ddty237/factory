<?php

namespace App\Http\Controllers;

use App\Models\Direction;
use App\Models\Product;
use App\Models\SubProduct;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::all();
        $subproducts = SubProduct::all();

        return view('produit.index',compact('products','subproducts'));
    }

    public function create()
    {
        $directions = Direction::all();
        return view('produit.create',compact('directions'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'designation' => ['required', 'string', 'max:255'],
            'description' => ['required', 'string'],
            'compte_collectif' => ['required', 'string'],
            'codification' => ['required', 'integer', 'max:255'],
            'direction' => ['required', 'integer']
        ]);

        Product::create([
            'designation' => $request->designation,
            'description' => $request->description,
            'compte_collectif' => $request->compte_collectif,
            'codification' => $request->codification,
            'direction_id' => $request->direction,
            'montant' => $request->montant
        ]);

        return redirect('produit')->with('success','Votre produit a été enregistré avec succès');
    }

    public function show(Product $produit)
    {
        $produit = $produit;
        return view('produit.show', compact('produit'));
    }

    public function edit()
    {
        return view('produit.edit');
    }
}
