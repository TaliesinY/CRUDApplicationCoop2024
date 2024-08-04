<?php

use Illuminate\Support\Facades\Route;
use App\Models\Product;

Route::get('/', function () {
    return view('home', [
        'heading' => 'Products',
        'products' => Product::all()
    ]);
});

Route::get('/products/{$id}', function($id) {
    return view('product', [
        'product' => Product::find($id)
    ]);
});
