<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use App\Categories;
use App\Promo;

class AdminController extends Controller
{
    public function index()
    {
        $Products = Product::all()->toArray();
        return view('admin.welcome', compact('Products'));
    }

    public function store(Request $request)
    {
//        dd($request->all());
        $product = $this->validate(request(), [
            'name' => 'required',
            'description' => 'required',
            'img' => 'required',
            'price' => 'required|numeric',
            'stock' => 'required|numeric',
            'weight' => 'required|numeric',
            'categories_id' => 'required|numeric',
            'promos_id' => 'required|numeric',
        ]);
        Product::create($product);

        return redirect('/admin')
            ->with('flash_message', ' Niquel, c\'est bien ajouté ')
            ->with('flash_type', 'alert-success');
    }
    public function create()
    {
        $idCategorie = Categories::all()->toArray();
        $idPromo = Promo::all()->toArray();
        return view('admin.add-product')
            ->with(['idCategorie' => $idCategorie])
            ->with(['idPromo'=>$idPromo]);
    }
    public function edit($id)
    {
//        $product = Product::with(['Promo'])->find($id);
        $product = Product::find($id);
//        dd($product);
        $promo = Promo::all();
//        dump($product->id);
        return view('admin.edit')
            ->with(['product' => $product])
        ->with(['promo' => $promo]);

    }
    public function update(Request $request, $id)
    {
//        dd($request);
        $product = Product::find($id);
//        dump($product);
        $product->name = $request->get('name');
        $product->price = $request->get('price');
        $product->stock = $request->get('stock');
        $product->weight = $request->get('weight');
        $product->description = $request->get('description');
        $product->promos_id = $request->get('promos_id');
        $product->save();
//        @dd($product);
        return redirect('admin')
            ->with('flash_message', ' Produit mis à jour ')
            ->with('flash_type', 'alert-warning');
    }
    public function destroy($id)
    {
        $product = Product::find($id);
        $product->delete();
        return redirect('admin')
            ->with('flash_message', 'Produit supprimé')
            ->with('flash_type', 'alert-danger');

    }
}
