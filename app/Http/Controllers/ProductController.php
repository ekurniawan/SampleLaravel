<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;

class ProductController extends Controller
{

    public function index()
    {
        $results = Product::all();
        return view('products.index')->with('products',$results); 
    }

    public function store(Request $request)
    {
        $product = new Product();
        $product->name = $request->get('name');
        $product->details = $request->get('details');
        $product->save();
        return response()->json($product);
    }

 
    public function show($id)
    {
        $product = Product::find($id);
        return response()->json($product);
    }


    public function update(Request $request, $id)
    {
        $product = Product::find($id);
        $product->name = $request->name;
        $product->details = $request->details;
        $product->save();
        return response()->json($product);
    }

    
    public function destroy($id)
    {
        $product = Product::destroy($id);
        return response()->json($product);
    }
}
