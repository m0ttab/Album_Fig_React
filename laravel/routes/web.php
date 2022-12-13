<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FigurinhasController;
use App\Http\Controllers\PacotesController;
use App\Http\Controllers\UsuariosController;
use App\Http\Controllers\ComprasController;
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
Route::get('/figurinhas/edit/{id}', [FigurinhasController::class, 'show']);
Route::post('/figurinhas/add', [FigurinhasController::class, 'insert']);
Route::post('/figurinhas/update', [FigurinhasController::class, 'update']);
Route::get('/figurinhas/delete/{id}', [FigurinhasController::class, 'destroy']);

Route::get('/usuarios', [UsuariosController::class, 'index']);
Route::get('/usuarios/create', [UsuariosController::class, 'create']);
Route::get('/usuarios/edit/{id}', [UsuariosController::class, 'show']);
Route::post('/usuarios/add', [UsuariosController::class, 'insert']);
Route::post('/usuarios/update', [UsuariosController::class, 'update']);
Route::get('/usuarios/delete/{id}', [UsuariosController::class, 'destroy']);

Route::get('/login', [UsuariosController::class, 'login']);
Route::post('/login/validar', [UsuariosController::class, 'validar']);

Route::get('/pacotes', [PacotesController::class, 'index']);
Route::get('/compras', [ComprasController::class, 'index']);

Route::get('/api/figurinhas', function () {

    $figurinhas = DB::select('SELECT id, pos, nome as name FROM figurinhas');

    echo json_encode($figurinhas);
});

Route::get('/api/album', function () {

    $album = DB::select('SELECT id, pos FROM figurinhas');

    echo json_encode($album);
});

Route::get('/comprar', [FigurinhasController::class, 'comprar']);

Route::get('/api/compradas', function(){
  $compradas = DB::select('SELECT figurinhas.id, figurinhas.pos, figurinhas.nome as name FROM figurinhas JOIN compras ON figurinhas.id = compras.id_pacote');

  echo json_encode($compradas);
});
