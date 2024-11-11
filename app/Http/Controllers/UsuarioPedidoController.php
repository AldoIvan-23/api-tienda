<?php

namespace App\Http\Controllers;

use App\Models\Categoria;
use App\Models\Pedido;
use Illuminate\Http\Request;
use App\Models\User;

class UsuarioPedidoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(User $usuario)
    {
        $categoria = Categoria::all();
        return response()->json($categoria->pedidos, 200);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, User $usuario)
    {
        $pedido = new Pedido($request->all());
        $pedido->user_id=$usuario->id;
        $pedido->save();

        return response()->json($pedido, 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        
        if($pedido->user_id != $usuario->id){
            return response()->json(['error' => 'El pedido no pertenece al usuario'], 404);
        }
        return response()->json($producto, 200);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(User $usuario, Request $request, Pedido $pedido)
    {
        if($pedido->user_id != $usuario->id){
            return response()->json(['error' => 'El pedido no pertenece al usuario'], 404);
        }

        $pedido = update($request->all());
        return response()->json($pedido, 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        if($pedido->user_id != $usuario->id){
            return response()->json(['error' => 'El pedido no pertenece al usuario'], 404);
        }

        $pedido->delete();
        return response()->json($pedido, 200);
    }
}
