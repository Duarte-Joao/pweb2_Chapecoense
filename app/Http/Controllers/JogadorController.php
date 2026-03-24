<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Jogador;

class JogadorController extends Controller
{
    public function index()
    {
        $jogadores = Jogador::orderBy('nome')->get();
        return view('jogadores.index', compact('jogadores'));
    }

    public function create()
    {
        return view('jogadores.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nome'            => 'required|string|max:255',
            'posicao'         => 'required|string|max:100',
            'numero_camisa'   => 'required|integer|min:1|max:99',
            'data_nascimento' => 'required|date',
            'nacionalidade'   => 'required|string|max:100',
        ], [
            'nome.required'            => 'O nome é obrigatório.',
            'posicao.required'         => 'A posição é obrigatória.',
            'numero_camisa.required'   => 'O número da camisa é obrigatório.',
            'numero_camisa.integer'    => 'O número da camisa deve ser um número inteiro.',
            'data_nascimento.required' => 'A data de nascimento é obrigatória.',
            'data_nascimento.date'     => 'Informe uma data válida.',
            'nacionalidade.required'   => 'A nacionalidade é obrigatória.',
        ]);

        Jogador::create($request->only([
            'nome', 'posicao', 'numero_camisa', 'data_nascimento', 'nacionalidade'
        ]));

        return redirect()->route('jogadores.index')->with('success', 'Jogador cadastrado com sucesso!');
    }

    public function edit($id)
    {
        $jogador = Jogador::findOrFail($id);
        return view('jogadores.edit', compact('jogador'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nome'            => 'required|string|max:255',
            'posicao'         => 'required|string|max:100',
            'numero_camisa'   => 'required|integer|min:1|max:99',
            'data_nascimento' => 'required|date',
            'nacionalidade'   => 'required|string|max:100',
        ], [
            'nome.required'            => 'O nome é obrigatório.',
            'posicao.required'         => 'A posição é obrigatória.',
            'numero_camisa.required'   => 'O número da camisa é obrigatório.',
            'numero_camisa.integer'    => 'O número da camisa deve ser um número inteiro.',
            'data_nascimento.required' => 'A data de nascimento é obrigatória.',
            'data_nascimento.date'     => 'Informe uma data válida.',
            'nacionalidade.required'   => 'A nacionalidade é obrigatória.',
        ]);

        $jogador = Jogador::findOrFail($id);
        $jogador->update($request->only([
            'nome', 'posicao', 'numero_camisa', 'data_nascimento', 'nacionalidade'
        ]));

        return redirect()->route('jogadores.index')->with('success', 'Jogador atualizado com sucesso!');
    }

    public function destroy($id)
    {
        $jogador = Jogador::findOrFail($id);
        $jogador->delete();

        return redirect()->route('jogadores.index')->with('success', 'Jogador removido com sucesso!');
    }

    public function search(Request $request)
    {
        $busca     = $request->input('busca');
        $jogadores = Jogador::where('nome', 'like', "%{$busca}%")->orderBy('nome')->get();

        return view('jogadores.index', compact('jogadores', 'busca'));
    }
}