<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Representante;
use Illuminate\Http\Request;

class RepresentanteController extends Controller
{
    public function index()
    {
        return Representante::all();
    }

    public function store(Request $request)
    {
        $request->validate([
            'nome' => 'required|string|max:50',
            'apelido' => 'nullable|string|max:50',
            'bi' => 'required|unique:representantes',
            'email' => 'required|email|unique:representantes',
            'senha' => 'required|string|min:6',
        ]);

        $representante = Representante::create([
            'nome' => $request->nome,
            'apelido' => $request->apelido,
            'bi' => $request->bi,
            'email' => $request->email,
            'senha' => bcrypt($request->senha),
        ]);

        return response()->json($representante, 201);
    }

    public function show($id)
    {
        return Representante::findOrFail($id);
    }

    public function update(Request $request, $id)
    {
        $representante = Representante::findOrFail($id);

        $request->validate([
            'nome' => 'sometimes|required|string|max:50',
            'apelido' => 'nullable|string|max:50',
            'bi' => 'sometimes|required|unique:representantes,bi,' . $representante->id,
            'email' => 'sometimes|required|email|unique:representantes,email,' . $representante->id,
            'senha' => 'sometimes|required|string|min:6',
        ]);

        $representante->update($request->all());

        return response()->json($representante);
    }

    public function destroy($id)
    {
        $representante = Representante::findOrFail($id);
        $representante->delete();
        return response()->json(null, 204);
    }
}
