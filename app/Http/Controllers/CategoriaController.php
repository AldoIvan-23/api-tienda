<?php

namespace App\Http\Controllers;

use App\Models\Categoria;
use Illuminate\Http\Request;

class CategoriaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categoria = Categoria::all();
        return response()->json($categoria->productos, 200);
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $categoria = new Categoria($request->all());
        $categoria->save();

        return response()->json($categoria, 201);

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
        $categoria = Categoria::find($id);

        if($categoria == null){
            return response()->json("Categoria no encontrada",404);

        }
        return response()->json($categoria,200);
    }

   

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
        $categoria = Categoria::find($id);
        if($categoria == null){
            return response()->json("Categoria no encontrada",404);

        }
        $categoria->update($request->all());
        return response()->json($categoria,200);

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $categoria = Categoria::find($id);
        if($categoria == null){
            return response()->json("Categoria no encontrada",404);

        }
        $categoria->delete();
        return response()->json(null,204);
    }
}
