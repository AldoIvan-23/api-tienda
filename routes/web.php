<?php

use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return view('welcome');
});
Route::get('/user', function (request $request){
    return $request->user();
})->middleware('auth:sanctum');

Route::get('categorias/{categoria}/productos',
        [CategoriaProductoController::class, 'index']);

 Route::post('categorias/{categoria}/productos',
        [CategoriaProductoController::class, 'store']);

Route::get('categorias/{categoria}/productos/{producto}',
        [CategoriaProductoController::class, 'destroy']);