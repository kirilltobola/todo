<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


Route::put('/item/{id}', [\App\Http\Controllers\ItemController::class, 'update'])->name("update");

Route::put('/item/{order}/{dir}', [\App\Http\Controllers\ItemController::class, 'updateOrder'])->name("order");

Route::delete('/item/{id}', [\App\Http\Controllers\ItemController::class, 'delete'])->name("delete");

Route::post('/', [\App\Http\Controllers\ItemController::class, 'store'])->name("store");

Route::get('/', [\App\Http\Controllers\ItemController::class, 'index'])->name("index");
