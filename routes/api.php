<?php

use App\Http\Controllers\KategoriaController;
use App\Http\Controllers\ReceptController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
//Recept
Route::get('osszes_recept', [ReceptController::class, 'osszesRecept']);
Route::get('receptek', [ReceptController::class, 'index']);
Route::post('uj_recept', [ReceptController::class, 'store']);
Route::delete('recept_torol/{id}', [ReceptController::class, 'destroy']);

Route::get('receptek/{id}', [ReceptController::class, 'show']);
Route::patch('receptek/{id}', [ReceptController::class, 'update']);

//Kategoria
Route::get('kategoriak', [KategoriaController::class, 'index']);
Route::post('uj_kategoria', [KategoriaController::class, 'store']);
Route::delete('kategoria_torol/{id}', [KategoriaController::class, 'destroy']);
Route::get('kategoriak/{id}', [KategoriaController::class, 'show']);
Route::patch('kategoriak/{id}', [KategoriaController::class, 'update']);
