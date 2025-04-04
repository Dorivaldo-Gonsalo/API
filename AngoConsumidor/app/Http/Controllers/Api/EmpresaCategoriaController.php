<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\EmpresaCategoria;
use Illuminate\Http\Request;

class EmpresaCategoriaController extends Controller
{
    public function index()
    {
        return EmpresaCategoria::all();
    }

    public function store(Request $request)
    {
        $request->validate([
            'id_empresa' => 'required|exists:empresas,id',
            'id_categoria' => 'required|exists:categorias,id',
        ]);

        $empresaCategoria = EmpresaCategoria::create($request->all());
        return response()->json($empresaCategoria, 201);
    }

    public function show($id)
    {
        return EmpresaCategoria::findOrFail($id);
    }

    public function destroy($id)
    {
        $empresaCategoria = EmpresaCategoria::findOrFail($id);
        $empresaCategoria->delete();
        return response()->json(null, 204);
    }
}
