<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\categorias;
use App\Models\materiales as ModelsMateriales;
use Illuminate\Http\Request;

class materiales extends Controller
{
    public function index()
    {
        $materiales = ModelsMateriales::all();
        $categorias = categorias::all();
        $materiales->categorias = $categorias;
        return response()->json($materiales, 200);
    }

    public function getMaterial($id)
    {
        try {
            $material = ModelsMateriales::find($id);
            $categorias = categorias::all();
            $material->categorias = $categorias;

            return response()->json($material, 200);
        } catch (\Throwable $th) {
            return response()->json(['error' => $th->getMessage()], 500);
        }
    }

    public function store(Request $request)
    {
        try {
            $input = $request->all();
            $material = ModelsMateriales::create($input);
            return response()->json($material, 201);
        } catch (\Throwable $th) {
            return response()->json(['error' => $th->getMessage()], 500);
        }
    }

    public function updateMaterial($id, Request $request)
    {
        try {
            $input = $request->all();
            $material = ModelsMateriales::find($id);
            $material->update($input);
            return response()->json($material, 200);
        } catch (\Throwable $th) {
            return response()->json(['error' => $th->getMessage()], 500);
        }
    }
}
