<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\categorias as ModelsCategorias;
use Illuminate\Http\Request;

class categorias extends Controller
{
    public function index()
    {
        $categorias = ModelsCategorias::all();
        return response()->json($categorias, 200);
    }

    public function store(Request $request)
    {
        try {
            $input = $request->all();
            $categoria = ModelsCategorias::create($input);
            return response()->json($categoria, 201);
        } catch (\Throwable $th) {
            return response()->json(['error' => $th->getMessage()], 500);
        }
    }

    public function getCategory($id)
    {
        try {
            $categoria = ModelsCategorias::find($id);
            return response()->json($categoria, 200);
        } catch (\Throwable $th) {
            return response()->json(['error' => $th->getMessage()], 500);
        }
    }

    public function updateCategory($id, Request $request)
    {
        try {
            $input = $request->all();

            $categoria = ModelsCategorias::find($id);

            $input['actualizado_a'] = date('Y-m-d H:i:s');

            $categoria->update($input);

            return response()->json($categoria, 200);
        } catch (\Throwable $th) {
            return response()->json(['error' => $th->getMessage()], 500);
        }
    }
}
