<?php

namespace App\Http\Controllers;

use App\Models\Product;

class ProductController extends Controller
{
    public function index(){
        return view('products', [
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
}
