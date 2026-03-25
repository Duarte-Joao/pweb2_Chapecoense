@extends('layouts.app')

@section('content')

<div class="flex justify-between items-center mb-6">
    <h1 class="text-2xl font-bold text-green-700">Sócios</h1>
    <a href="{{ route('socios.create') }}"
       class="bg-green-700 text-white px-4 py-2 rounded hover:bg-green-800">
        + Novo Sócio
    </a>
</div>

@if(session('success'))
    <div class="bg-green-100 text-green-800 border border-green-300 px-4 py-2 rounded mb-4">
        {{ session('success') }}
    </div>
@endif

{{--<form action="{{ route('socios.search') }}" method="POST" class="flex gap-2 mb-6">
    @csrf
    <input type="text" name="busca" value="{{ $busca ?? '' }}"
           placeholder="Buscar por nome..."
           class="border border-gray-300 rounded px-3 py-2 w-full max-w-sm focus:outline-none focus:ring-2 focus:ring-green-500">
    <button type="submit" class="bg-green-700 text-white px-4 py-2 rounded hover:bg-green-800">Buscar</button>
    <a href="{{ route('socios.index') }}" class="bg-gray-300 text-gray-700 px-4 py-2 rounded hover:bg-gray-400">Limpar</a>
</form>--}}

<div class="overflow-x-auto">
    <table class="w-full bg-white rounded shadow text-sm">
        <thead class="bg-green-700 text-white">
            <tr>
                <th class="px-4 py-3 text-left">#</th>
                <th class="px-4 py-3 text-left">Nome</th>
                <th class="px-4 py-3 text-left">CPF</th>
                <th class="px-4 py-3 text-left">E-mail</th>
                <th class="px-4 py-3 text-left">Telefone</th>
                <th class="px-4 py-3 text-left">Categoria</th>
                <th class="px-4 py-3 text-left">Associado em</th>
                <th class="px-4 py-3 text-center">Ações</th>
            </tr>
        </thead>
        <tbody>
            @forelse($socios as $socio)
            <tr class="border-b hover:bg-gray-50">
                <td class="px-4 py-3">{{ $socio->id }}</td>
                <td class="px-4 py-3">{{ $socio->nome }}</td>
                <td class="px-4 py-3">{{ $socio->cpf }}</td>
                <td class="px-4 py-3">{{ $socio->email }}</td>
                <td class="px-4 py-3">{{ $socio->telefone }}</td>
                <td class="px-4 py-3">{{ $socio->categoria_socio }}</td>
                <td class="px-4 py-3">{{ \Carbon\Carbon::parse($socio->data_associacao)->format('d/m/Y') }}</td>
                <td class="px-4 py-3 text-center flex justify-center gap-2">
                    <a href="{{ route('socios.edit', $socio->id) }}"
                       class="bg-yellow-400 text-white px-3 py-1 rounded hover:bg-yellow-500 text-xs">Editar</a>
                    <form action="{{ route('socios.destroy', $socio->id) }}" method="POST"
                          onsubmit="return confirm('Deseja realmente excluir este sócio?')">
                        @csrf
                        @method('DELETE')
                        <button type="submit"
                                class="bg-red-600 text-white px-3 py-1 rounded hover:bg-red-700 text-xs">Excluir</button>
                    </form>
                </td>
            </tr>
            @empty
            <tr>
                <td colspan="8" class="text-center py-6 text-gray-500">Nenhum sócio encontrado.</td>
            </tr>
            @endforelse
        </tbody>
    </table>
</div>

@endsection