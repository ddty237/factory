<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\SubProduct;
use Illuminate\Http\Request;

class SubProductController extends Controller
{
    public function create()
    {
        $products = Product::where('have_sub_categorie',1)->get();
        return view('subProduct.create',compact('products'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'product' => ['required'],
            'description' => ['required']
        ]);

        SubProduct::create([
            'product_id' => $request->product,
            'product_description' => $request->description,
        ]);

        return redirect('subProduct/create')->with('success','Votre sous-produit a été enregistré avec succès.');
    }

    public function edit(SubProduct $subProduct)
    {
        $subProduct = $subProduct;
        $products = Product::where('have_sub_categorie',1)->get();
        return view('subProduct.edit', compact('subProduct','products'));
    }

    public function show(SubProduct $subProduct)
    {
        $subProduct = $subProduct;
        return view('subproduct.show', compact('subProduct'));
    }

    public function update(Request $request, SubProduct $subProduct)
    {
        $request->validate([
            'product' => ['required'],
            'description' => ['required']
        ]);

        SubProduct::where('id',$subProduct->id)->update([
            'product_id' => $request->product,
            'product_description' => $request->description,
        ]);

        return redirect('produit')->with('success','Votre sous-produit a été mise à jour avec succès.');
    }



}
