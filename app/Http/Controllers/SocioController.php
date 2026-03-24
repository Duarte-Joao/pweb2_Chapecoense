<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Socio;

class SocioController extends Controller
{
    public function index()
    {
        $socios = Socio::orderBy('nome')->get();
        return view('socios.index', compact('socios'));
    }

    public function create()
    {
        return view('socios.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nome'             => 'required|string|max:255',
            'cpf'              => 'required|string|size:11|unique:socios,cpf',
            'email'            => 'required|email|max:255',
            'telefone'         => 'required|string|max:20',
            'categoria_socio'  => 'required|string|max:100',
            'data_associacao'  => 'required|date',
        ], [
            'nome.required'            => 'O nome é obrigatório.',
            'cpf.required'             => 'O CPF é obrigatório.',
            'cpf.size'                 => 'O CPF deve ter exatamente 11 dígitos (sem pontos ou traços).',
            'cpf.unique'               => 'Este CPF já está cadastrado.',
            'email.required'           => 'O e-mail é obrigatório.',
            'email.email'              => 'Informe um e-mail válido.',
            'telefone.required'        => 'O telefone é obrigatório.',
            'categoria_socio.required' => 'A categoria é obrigatória.',
            'data_associacao.required' => 'A data de associação é obrigatória.',
            'data_associacao.date'     => 'Informe uma data válida.',
        ]);

        Socio::create($request->only([
            'nome', 'cpf', 'email', 'telefone', 'categoria_socio', 'data_associacao'
        ]));

        return redirect()->route('socios.index')->with('success', 'Sócio cadastrado com sucesso!');
    }

    public function edit($id)
    {
        $socio = Socio::findOrFail($id);
        return view('socios.edit', compact('socio'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nome'             => 'required|string|max:255',
            'cpf'              => 'required|string|size:11|unique:socios,cpf,' . $id,
            'email'            => 'required|email|max:255',
            'telefone'         => 'required|string|max:20',
            'categoria_socio'  => 'required|string|max:100',
            'data_associacao'  => 'required|date',
        ], [
            'nome.required'            => 'O nome é obrigatório.',
            'cpf.required'             => 'O CPF é obrigatório.',
            'cpf.size'                 => 'O CPF deve ter exatamente 11 dígitos (sem pontos ou traços).',
            'cpf.unique'               => 'Este CPF já está cadastrado.',
            'email.required'           => 'O e-mail é obrigatório.',
            'email.email'              => 'Informe um e-mail válido.',
            'telefone.required'        => 'O telefone é obrigatório.',
            'categoria_socio.required' => 'A categoria é obrigatória.',
            'data_associacao.required' => 'A data de associação é obrigatória.',
            'data_associacao.date'     => 'Informe uma data válida.',
        ]);

        $socio = Socio::findOrFail($id);
        $socio->update($request->only([
            'nome', 'cpf', 'email', 'telefone', 'categoria_socio', 'data_associacao'
        ]));

        return redirect()->route('socios.index')->with('success', 'Sócio atualizado com sucesso!');
    }

    public function destroy($id)
    {
        $socio = Socio::findOrFail($id);
        $socio->delete();

        return redirect()->route('socios.index')->with('success', 'Sócio removido com sucesso!');
    }

    public function search(Request $request)
    {
        $busca  = $request->input('busca');
        $socios = Socio::where('nome', 'like', "%{$busca}%")->orderBy('nome')->get();

        return view('socios.index', compact('socios', 'busca'));
    }
}