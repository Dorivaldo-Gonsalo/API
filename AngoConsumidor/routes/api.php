<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\UsuarioController;
use App\Http\Controllers\Api\RepresentanteController;
use App\Http\Controllers\Api\CategoriaController;
use App\Http\Controllers\Api\EmpresaController;
use App\Http\Controllers\Api\EmpresaCategoriaController;
use App\Http\Controllers\Api\CriticaController;
use App\Http\Controllers\Api\RespostaController;
use App\Http\Controllers\Api\SubrespController;
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



Route::apiResource('usuarios', UsuarioController::class);
Route::apiResource('representantes', RepresentanteController::class);
Route::apiResource('categorias', CategoriaController::class);
Route::apiResource('empresas', EmpresaController::class);
Route::apiResource('empresa_categoria', EmpresaCategoriaController::class);
Route::apiResource('criticas', CriticaController::class);
Route::apiResource('respostas', RespostaController::class);
Route::apiResource('subresp', SubrespController::class);
