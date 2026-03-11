<?php

namespace App\Http\Controllers;

use App\Models\Jogador;
use Illuminate\Http\Request;

class JogadorController extends Controller
{
    public function index()
    {
        $jogadores = Jogador::all();
        return view('jogadores.list', compact('jogadores'));
    }

    public function create()
    {
        return view('jogadores.create');
    }

    public function store(Request $request)
    {
        Jogador::create($request->all());
        return redirect()->route('jogadores.index');
    }

    public function destroy($id)
    {
        $jogador = Jogador::findOrFail($id);
        $jogador->delete();

        return redirect()->route('jogadores.index');
    }

    public function edit($id)
    {
        $jogador = Jogador::findOrFail($id);
        return view('jogadores.edit', compact('jogador'));
    }

    public function update(Request $request, $id)
    {
        $jogador = Jogador::findOrFail($id);
        $jogador->update($request->all());

        return redirect()->route('jogadores.index');
    }
}
