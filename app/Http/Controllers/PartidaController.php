<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Partida;
use App\Models\Jogador;

class PartidaController extends Controller
{
    public function index()
    {
        // with('artilheiro') carrega o jogador junto — evita N+1 queries
        $partidas = Partida::with('artilheiro')->orderBy('data_partida', 'desc')->get();
        return view('partidas.index', compact('partidas'));
    }

    public function create()
    {
        $jogadores = Jogador::orderBy('nome')->get();
        return view('partidas.create', compact('jogadores'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'adversario'       => 'required|string|max:255',
            'data_partida'     => 'required|date',
            'estadio'          => 'required|string|max:255',
            'competicao'       => 'required|string|max:255',
            'gols_chapecoense' => 'required|integer|min:0',
            'gols_adversario'  => 'required|integer|min:0',
            'jogador_id'       => 'nullable|exists:jogadores,id',
        ], [
            'adversario.required'       => 'O adversário é obrigatório.',
            'data_partida.required'     => 'A data da partida é obrigatória.',
            'data_partida.date'         => 'Informe uma data válida.',
            'estadio.required'          => 'O estádio é obrigatório.',
            'competicao.required'       => 'A competição é obrigatória.',
            'gols_chapecoense.required' => 'Os gols da Chapecoense são obrigatórios.',
            'gols_adversario.required'  => 'Os gols do adversário são obrigatórios.',
            'jogador_id.exists'         => 'Jogador inválido.',
        ]);

        Partida::create($request->only([
            'adversario', 'data_partida', 'estadio', 'competicao',
            'gols_chapecoense', 'gols_adversario', 'jogador_id',
        ]));

        return redirect()->route('partidas.index')->with('success', 'Partida cadastrada com sucesso!');
    }

    public function edit($id)
    {
        $partida   = Partida::findOrFail($id);
        $jogadores = Jogador::orderBy('nome')->get();
        return view('partidas.edit', compact('partida', 'jogadores'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'adversario'       => 'required|string|max:255',
            'data_partida'     => 'required|date',
            'estadio'          => 'required|string|max:255',
            'competicao'       => 'required|string|max:255',
            'gols_chapecoense' => 'required|integer|min:0',
            'gols_adversario'  => 'required|integer|min:0',
            'jogador_id'       => 'nullable|exists:jogadores,id',
        ]);

        $partida = Partida::findOrFail($id);
        $partida->update($request->only([
            'adversario', 'data_partida', 'estadio', 'competicao',
            'gols_chapecoense', 'gols_adversario', 'jogador_id',
        ]));

        return redirect()->route('partidas.index')->with('success', 'Partida atualizada com sucesso!');
    }

    public function destroy($id)
    {
        $partida = Partida::findOrFail($id);
        $partida->delete();

        return redirect()->route('partidas.index')->with('success', 'Partida removida com sucesso!');
    }

    public function search(Request $request)
    {
        $busca    = $request->input('busca');
        $partidas = Partida::with('artilheiro')
                           ->where('adversario', 'like', "%{$busca}%")
                           ->orderBy('data_partida', 'desc')
                           ->get();

        return view('partidas.index', compact('partidas', 'busca'));
    }
}