<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoriaProductoController;
use App\Http\Controllers\UsuarioPedidoController;
use App\Http\Controllers\CategoriaController;

Route::get('/user', function (request $request){
    return $request->user();
})->middleware('auth:sanctum');

Route::get('categorias/{categoria}/productos',
        [CategoriaProductoController::class, 'index']);

 Route::post('categorias/{categoria}/productos',
        [CategoriaProductoController::class, 'store']);

Route::post('categorias/{categoria}/productos',
        [CategoriaProductoController::class, 'show']);

Route::get('categorias/{categoria}/productos/{producto}',
        [CategoriaProductoController::class, 'update']);

Route::get('categorias/{categoria}/productos/{producto}',
        [CategoriaProductoController::class, 'destroy']);



Route::get('usuarios/{usuario}/pedidos/{pedido}',
        [UsuarioPedidoController::class, 'index']);

Route::get('usuarios/{usuario}/pedidos/{pedido}',
        [UsuarioPedidoController::class, 'store']);

Route::post('usuarios/{usuario}/pedidos/{pedido}',
        [UsuarioPedidoController::class, 'show']);

Route::post('usuarios/{usuario}/pedidos/{pedido}',
        [UsuarioPedidoController::class, 'update']);

Route::get('usuarios/{usuario}/pedidos/{pedido}',
        [UsuarioPedidoController::class, 'destroy']);


Route::get('categorias',
        [CategoriaController::class, 'index']);

Route::post('categorias',
        [CategoriaController::class, 'store']);

Route::get('categorias/{categoria}',
        [CategoriaController::class, 'show']);

Route::put('categorias/{categoria}',
        [UsuarioPedidoController::class, 'update']);

Route::delete('categorias/{categoria}',
        [UsuarioPedidoController::class, 'destroy']);