<?php

use App\Http\Controllers\Api\categorias;
use App\Http\Controllers\Api\materiales;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/categorias', [categorias::class, 'index']);
Route::post('/categorias', [categorias::class, 'store']);
Route::get('/categorias/{id}', [categorias::class, 'getCategory']);
Route::put('/categorias/{id}', [categorias::class, 'updateCategory']);

Route::get('/materiales', [materiales::class, 'index']);
Route::post('/materiales', [materiales::class, 'store']);
Route::get('/materiales/{id}', [materiales::class, 'getMaterial']);
Route::put('/materiales/{id}', [materiales::class, 'updateMaterial']);
