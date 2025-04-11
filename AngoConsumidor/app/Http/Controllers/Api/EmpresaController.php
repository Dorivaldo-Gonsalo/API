<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Empresa;
use Illuminate\Http\Request;
use Illuminate\Validation\Rules;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Auth\Events\Registered;


class EmpresaController extends Controller
{
    public function index()
    {
        return Empresa::with('representante', 'categorias')->get();
    }

    public function store(Request $request)
    {
        $request->validate([
            'nome' => 'required|string|max:50',
            'endereco' => 'nullable|string|max:100',
            'email' => 'required|string|email|max:255|unique:empresas',
            'senha' => ['required', 'confirmed', Rules\Password::defaults()],
            'id_representante' => 'required|exists:representantes,id',
            'telefone' => 'nullable|string|max:15',
            'ano_util' => 'nullable|integer',
        ]);

        $empresa = Empresa::create([
            'nome' => $request->nome,
            'endereco' => $request->endereco,
            'email' => $request->email,
            'senha' => Hash::make($request->password),
            'id_representante' => $request->id_representante,
            'telefone' => $request->telefone,
            'ano_util' => $request->ano_util,

        ])->givePermissionTo('empresa');

        // Dispara o evento registrado
        event(new Registered($empresa));

        // Realiza o login do empresa
        Auth::login($empresa);

        return response()->json($empresa, 201);
    }

    public function show($id)
    {
        return Empresa::with('representante', 'categorias')->findOrFail($id);
    }

    public function update(Request $request, $id)
    {
        $empresa = Empresa::findOrFail($id);

        $request->validate([
            'nome' => 'sometimes|required|string|max:50',
            'endereco' => 'nullable|string|max:100',
            'email' => 'sometimes|required|string|email|max:255|unique:empresas,email,' . $empresa->id,
            'senha' => 'nullable|string|min:6',
            'id_representante' => 'sometimes|required|exists:representantes,id',
            'telefone' => 'nullable|string|max:15',
            'ano_util' => 'nullable|integer',
        ]);

        if ($request->has('senha')) {
            $empresa->senha = bcrypt($request->senha);
        }

        $empresa->update($request->except('senha'));

        return response()->json($empresa);
    }

    public function destroy($id)
    {
        $empresa = Empresa::findOrFail($id);
        $empresa->delete();
        return response()->json(null, 204);
    }
}
