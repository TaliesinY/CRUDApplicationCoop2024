<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProductController;

Route::get('/', [ProductController::class, 'index']);

Route::get('/products/create', [ProductController::class, 'create']);

Route::get('/products/listing', [ProductController::class, 'listing']);

Route::post('/products', [ProductController::class, 'store']);

Route::get('/products/{product}', [ProductController::class, 'show']);

Route::get('/register', [UserController::class, 'register']);

Route::post('/users', [UserController::class, 'store']);

Route::post('/logout', [UserController::class, 'logout']);

Route::get('/login', [UserController::class, 'login']);

Route::post('/authenticate', [UserController::class, 'authenticate']);

Route::get('/manage', [ProductController::class, 'manage'])->middleware('auth');

Route::delete('/products/{product}', [ProductController::class, 'destroy']);

Route::get('/products/{product}/edit', [ProductController::class, 'edit'])->middleware('auth');

Route::put('/products/{product}', [ProductController::class, 'update'])->middleware('auth');
