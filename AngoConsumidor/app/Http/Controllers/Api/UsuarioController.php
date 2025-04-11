<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Usuario;
use Illuminate\Http\Request;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\View\View;

class UsuarioController extends Controller
{
    public function index()
    {
        return Usuario::all();
    }

    public function store(Request $request)
    {
        $request->validate([
            'nome' => 'required|string|max:50',
            'apelido' => 'nullable|string|max:50',
            'bi' => 'required|unique:usuarios',
            'email' => 'required|email|unique:usuarios',
            'senha' => 'required|string|min:6',
        ]);

        $usuario = Usuario::create([
            'nome' => $request->nome,
            'apelido' => $request->apelido,
            'bi' => $request->bi,
            'email' => $request->email,
            'senha' => Hash::make($request->password),
        ])->givePermissionTo('usuario');

        // Dispara o evento registrado
        event(new Registered($usuario));

        // Realiza o login do usuario
        Auth::login($usuario);

        return response()->json($usuario, 201);
    }

    public function show($id)
    {
        $usuario = Usuario::findOrFail($id);
        return $usuario;
    }

    public function update(Request $request, $id)
    {
        $usuario = Usuario::findOrFail($id);

        $request->validate([
            'nome' => 'sometimes|required|string|max:50',
            'apelido' => 'nullable|string|max:50',
            'bi' => 'sometimes|required|unique:usuarios,bi,' . $usuario->id,
            'email' => 'sometimes|required|email|unique:usuarios,email,' . $usuario->id,
            'senha' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);

        $usuario->update($request->all());

        return response()->json($usuario);
    }

    public function destroy($id)
    {
        $usuario = Usuario::findOrFail($id);
        $usuario->delete();
        return response()->json(null, 204);
    }
}
