<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ArtistaController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\MusicaController;
use App\Http\Controllers\RelacionamentoController;


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
Route::get('artistas/buscar',[ArtistaController::class,'buscar']);
Route::resource('artistas', ArtistaController::class);

Route::get('musicas/buscar',[MusicaController::class,'buscar']);
Route::resource('musicas', MusicaController::class);

Route::get('relacionamentos/buscar',[RelacionamentoController::class,'buscar']);
Route::resource('relacionamentos', RelacionamentoController::class);

Route::get('/', [HomeController::class, 'index']);
