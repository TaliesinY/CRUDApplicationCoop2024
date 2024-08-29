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

    public function show(Product $product){
        return view('product', [
            'product' => $product
        ]);
    }

    public function create(){
        return view('create');
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
