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

Route::prefix('todo')->group(function() {
    Route::put(
        '/item/{id}',
        [\App\Http\Controllers\ItemController::class, 'update']
    )->middleware("auth")->name("update");

    Route::delete(
        '/item/{id}',
        [\App\Http\Controllers\ItemController::class, 'delete']
    )->middleware("auth")->name("delete");

    Route::put(
        '/item/{order}/{dir}',
        [\App\Http\Controllers\ItemController::class, 'updateOrder']
    )->middleware("auth")->name("order");

    Route::post(
        '/',
        [\App\Http\Controllers\ItemController::class, 'store']
    )->middleware("auth")->name("store");

    Route::get(
        '/',
        [\App\Http\Controllers\ItemController::class, 'index']
    )->name("todo");
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

Route::get("/", function () {
    return redirect()->route("todo");
});

require __DIR__.'/auth.php';
