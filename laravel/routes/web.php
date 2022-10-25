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

Route::get('/figurinhas', function () {
    return view('figurinhas.index');
});
Route::get('/figurinhas/create', function () {
    return view('figurinhas.create');
});

Route::get('/pacotes', function () {
    return view('pacotes.index');
});

Route::get('/compras', function () {
    return view('compras.index');
});



