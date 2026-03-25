@extends('layouts.app')

@section('content')

<div class="max-w-lg mx-auto bg-white rounded shadow p-6">
    <h1 class="text-2xl font-bold text-green-700 mb-6">Cadastrar Partida</h1>

    @if($errors->any())
        <div class="bg-red-100 text-red-700 border border-red-300 px-4 py-3 rounded mb-4">
            <ul class="list-disc list-inside text-sm">
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('partidas.store') }}" method="POST">
        @csrf

        <div class="mb-4">
            <label class="block text-sm font-medium text-gray-700 mb-1">Adversário *</label>
            <input type="text" name="adversario" value="{{ old('adversario') }}"
                   class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-green-500">
        </div>

        <div class="mb-4">
            <label class="block text-sm font-medium text-gray-700 mb-1">Data da Partida *</label>
            <input type="date" name="data_partida" value="{{ old('data_partida') }}"
                   class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-green-500">
        </div>

        <div class="mb-4">
            <label class="block text-sm font-medium text-gray-700 mb-1">Estádio *</label>
            <input type="text" name="estadio" value="{{ old('estadio') }}"
                   class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-green-500">
        </div>

        <div class="mb-4">
            <label class="block text-sm font-medium text-gray-700 mb-1">Competição *</label>
            <select name="competicao"
                    class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-green-500">
                <option value="">Selecione...</option>
                @foreach(['Brasileirão Série A','Brasileirão Série B','Copa do Brasil','Copa Sul-Americana','Copa Libertadores','Campeonato Catarinense','Amistoso'] as $comp)
                    <option value="{{ $comp }}" {{ old('competicao') == $comp ? 'selected' : '' }}>{{ $comp }}</option>
                @endforeach
            </select>
        </div>

        <div class="grid grid-cols-2 gap-4 mb-4">
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">Gols Chapecoense *</label>
                <input type="number" name="gols_chapecoense" value="{{ old('gols_chapecoense', 0) }}" min="0"
                       class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-green-500">
            </div>
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">Gols Adversário *</label>
                <input type="number" name="gols_adversario" value="{{ old('gols_adversario', 0) }}" min="0"
                       class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-green-500">
            </div>
        </div>

        {{-- SELECT puxando dados da tabela jogadores --}}
        <div class="mb-6">
            <label class="block text-sm font-medium text-gray-700 mb-1">Artilheiro da Partida</label>
            <select name="jogador_id"
                    class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-green-500">
                <option value="">Nenhum</option>
                @foreach($jogadores as $jogador)
                    <option value="{{ $jogador->id }}" {{ old('jogador_id') == $jogador->id ? 'selected' : '' }}>
                        {{ $jogador->nome }} ({{ $jogador->posicao }} - Camisa {{ $jogador->numero_camisa }})
                    </option>
                @endforeach
            </select>
        </div>

        <div class="flex gap-3">
            <button type="submit" class="bg-green-700 text-white px-6 py-2 rounded hover:bg-green-800">Salvar</button>
            <a href="{{ route('partidas.index') }}" class="bg-gray-300 text-gray-700 px-6 py-2 rounded hover:bg-gray-400">Cancelar</a>
        </div>
    </form>
</div>

@endsection