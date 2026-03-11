<?php

namespace App\Http\Controllers;

use App\Models\Partida;
use Illuminate\Http\Request;

class PartidaController extends Controller
{
    public function index()
    {
        $partidas = Partida::all();
        return view('partidas.list', compact('partidas'));
    }

    public function create()
    {
        return view('partidas.create');
    }

    public function store(Request $request)
    {
        Partida::create($request->all());
        return redirect()->route('partidas.index');
    }

    public function destroy($id)
    {
        $partida = Partida::findOrFail($id);
        $partida->delete();

        return redirect()->route('partidas.index');
    }

    public function edit($id)
    {
        $partida = Partida::findOrFail($id);
        return view('partidas.edit', compact('partida'));
    }

    public function update(Request $request, $id)
    {
        $partida = Partida::findOrFail($id);
        $partida->update($request->all());

        return redirect()->route('partidas.index');
    }
}
