<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Resposta;
use Illuminate\Http\Request;

class RespostaController extends Controller
{
    public function index()
    {
        return Resposta::with('critica', 'subrespostas')->get();
    }

    public function store(Request $request)
    {
        $request->validate([
            'texto' => 'required|string|max:255',
            'classific' => 'nullable|integer',
            'id_critica' => 'required|exists:criticas,id',
        ]);

        $resposta = Resposta::create($request->all());
        return response()->json($resposta, 201);
    }

    public function show($id)
    {
        return Resposta::with('critica', 'subrespostas')->findOrFail($id);
    }

    public function update(Request $request, $id)
    {
        $resposta = Resposta::findOrFail($id);
        $resposta->update($request->all());
        return response()->json($resposta);
    }

    public function destroy($id)
    {
        $resposta = Resposta::findOrFail($id);
        $resposta->delete();
        return response()->json(null, 204);
    }
}
