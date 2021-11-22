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
            'designation' => ['required', 'string','unique:products'],
            'description' => ['required', 'string'],
            'compte_collectif' => ['required', 'string'],
            'codification' => ['required', 'string'],
            'direction' => ['required', 'integer'],
        ]);

        Product::create([
            'designation' => $request->designation,
            'description' => $request->description,
            'compte_collectif' => $request->compte_collectif,
            'codification' => $request->codification,
            'direction_id' => $request->direction,
            'have_sub_categorie' => $request->boolean('haveSubCategorie')
        ]);

        return redirect('produit/create')->with('success','Votre produit a été enregistré avec succès');
    }

    public function show(Product $produit)
    {
        $produit = $produit;
        return view('produit.show', compact('produit'));
    }

    public function edit(Product $produit)
    {
        $directions = Direction::all();
        return view('produit.edit', compact('produit','directions'));
    }

    public function update(Request $request, Product $produit)
    {
        $request->validate([
            'designation' => ['required', 'string'],
            'description' => ['required', 'string'],
            'compte_collectif' => ['required', 'string'],
            'codification' => ['required', 'numeric'],
            'direction' => ['required', 'integer']
        ]);

        Product::where('id',$produit->id)->update([
            'designation' => $request->designation,
            'description' => $request->description,
            'compte_collectif' => $request->compte_collectif,
            'codification' => $request->codification,
            'direction_id' => $request->direction,
            'have_sub_categorie' => $request->boolean('haveSubCategorie')
        ]);

        return redirect('produit')->with('success','Votre produit a été mise à jour avec succès');
    }
}
