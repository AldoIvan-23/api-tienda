<?php

namespace App\Http\Controllers;

use App\Models\Categoria;
use App\Models\Producto;
use Illuminate\Http\Request;

class CategoriaProductoController extends Controller
{
    //
    public function index(Categoria $categoria){
        return response()->json($categoria->productos, 200);
    }

    public function store(Request $request, Categoria $categoria){
        $producto = new Producto($request->all());
        $producto->categoria_id=$categoria->id;
        $producto->save();

        return response()->json($producto, 201);
    }

    public function show (Categoria $categoria, Producto $producto){
        if($producto->categoria_id != $categoria->id){
            return response()->json(['error' => 'El producto no pertenece a la categoria'], 404);
        }
        return response()->json(null, 200);
    }

    public function destroy (Categoria $categoria, Producto $producto){
        if($producto->categoria_id != $categoria->id){
            return response()->json(['error' => 'El producto no pertenece a la categoria'], 404);
        }

        $producto->delete();
        return response()->json(null, 204);
    }

}
