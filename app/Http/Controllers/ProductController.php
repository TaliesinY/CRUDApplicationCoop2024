<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class ProductController extends Controller
{
    public function index(){
        return view('products', [
            'products' => Product::latest()->filter(request(['search']))->paginate(4)
        ]);
    }

    public function listing(){
        return view('listing', [
            'products' => Product::latest()->filter(request(['search']))->get()
        ]);
    }

    public function show(Product $product){
        return view('product', [
            'product' => $product
        ]);
    }

    public function create(){
        return view('create');
    }

    public function manage(){
        return view('manage', [
            'products' => Product::all()
        ]);
    }

    public function edit(Product $product)
{
    return view('edit', ['product' => $product]);
}

public function update(Request $request, Product $product)
{
    $formFields = $request->validate([
        'name' => 'required',
        'price' => 'required',
        'provider' => 'required',
        'url' => 'required',
        'description' => 'required'
    ]);

    $product->update($formFields);

    return redirect('/manage');
}

public function destroy(Product $product)
{
    $product->delete();

    return redirect('/manage');
}

    public function store(Request $request){
        $formFields = $request->validate([
            'name' => 'required',
            'price' => 'required',
            'provider' => 'required',
            'url' => 'required',
            'description' => 'required'
        ]);
        Product::create($formFields);
        return redirect('/');
    }
}
