<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\SubProduct;
use Illuminate\Http\Request;

class SubProductController extends Controller
{
    public function create()
    {
        $products = Product::all();
        return view('subProduct.create',compact('products'));
    }

    public function store(Request $request)
    {
        SubProduct::create([
            'product_id' => $request->product,
            'product_description' => $request->description,
            'montant' => $request->montant
        ]);

        return redirect('produit')->with('message','Votre sous-produit a été enregistré avec succès.');
    }



}
