<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FigurinhasController;
use Illuminate\Support\Facades\DB;

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

Route::get('/figurinhas', [FigurinhasController::class, 'index']);
Route::get('/figurinhas/create', [FigurinhasController::class, 'create']);
Route::get('/figurinhas/edit/{id}', [FigurinhasController::class, 'update']);
Route::post('/figurinhas/add', [FigurinhasController::class, 'insert']);
Route::get('/figurinhas/delete/{id}', [FigurinhasController::class, 'destroy']);

Route::get('/api/figurinhas', function(){
    $figurinhas = DB::table('figurinhas')->get();

    echo json_encode($figurinhas);
});

Route::get('/pacotes', function () {
    return view('pacotes.index');
});

Route::get('/compras', function () {
    return view('compras.index');
});



