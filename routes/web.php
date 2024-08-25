<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProductController;

Route::get('/', [ProductController::class, 'index']);

Route::get('/products/create', [ProductController::class, 'create']);

Route::post('/products', [ProductController::class, 'store']);

Route::get('/products/{product}', [ProductController::class, 'show']);

Route::get('/register', [UserController::class, 'register']);

Route::post('/users', [UserController::class, 'store']);
