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


Route::put(
    '/item/{id}',
    [\App\Http\Controllers\ItemController::class, 'update'])->name("update"
)->middleware("auth");

Route::put(
    '/item/{order}/{dir}',
    [\App\Http\Controllers\ItemController::class, 'updateOrder']
)->middleware("auth")->name("order");

Route::delete(
    '/item/{id}',
    [\App\Http\Controllers\ItemController::class, 'delete']
)->middleware("auth")->name("delete");

Route::post(
    '/',
    [\App\Http\Controllers\ItemController::class, 'store']
)->middleware("auth")->name("store");

Route::get(
    '/',
    [\App\Http\Controllers\ItemController::class, 'index']
)->name("index");

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';
