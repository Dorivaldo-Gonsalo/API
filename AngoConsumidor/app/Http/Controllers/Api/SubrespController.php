<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Subresp;
use Illuminate\Http\Request;

class SubrespController extends Controller
{
    public function index()
    {
        return Subresp::with('resposta')->get();
    }

    public function store(Request $request)
    {
        $request->validate([
            'id_resp' => 'required|exists:respostas,id',
            'texto' => 'required|string|max:255',
            'classific' => 'nullable|integer',
        ]);

        $subresp = Subresp::create($request->all());
        return response()->json($subresp, 201);
    }

    public function show($id)
    {
        return Subresp::findOrFail($id);
    }

    public function update(Request $request, $id)
    {
        $subresp = Subresp::findOrFail($id);
        $subresp->update($request->all());
        return response()->json($subresp);
    }

    public function destroy($id)
    {
        $subresp = Subresp::findOrFail($id);
        $subresp->delete();
        return response()->json(null, 204);
    }
}
