<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Critica;
use Illuminate\Http\Request;

class CriticaController extends Controller
{
    public function index()
    {
        return Critica::with('usuario', 'empresa', 'respostas')->get();
    }

    public function store(Request $request)
    {
        $request->validate([
            'tipo_servico' => 'required|string|max:50',
            'texto' => 'required|string|max:255',
            'classific' => 'nullable|integer',
            'id_user' => 'required|exists:usuarios,id',
            'id_emp' => 'required|exists:empresas,id',
        ]);

        $critica = Critica::create($request->all());
        return response()->json($critica, 201);
    }

    public function show($id)
    {
        return Critica::with('usuario', 'empresa', 'respostas')->findOrFail($id);
    }

    public function update(Request $request, $id)
    {
        $critica = Critica::findOrFail($id);
        $critica->update($request->all());
        return response()->json($critica);
    }

    public function destroy($id)
    {
        $critica = Critica::findOrFail($id);
        $critica->delete();
        return response()->json(null, 204);
    }
}
