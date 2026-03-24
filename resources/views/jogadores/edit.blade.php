@extends('layouts.app')

@section('content')

<div class="max-w-lg mx-auto bg-white rounded shadow p-6">
    <h1 class="text-2xl font-bold text-green-700 mb-6">Editar Jogador</h1>

    @if($errors->any())
        <div class="bg-red-100 text-red-700 border border-red-300 px-4 py-3 rounded mb-4">
            <ul class="list-disc list-inside text-sm">
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('jogadores.update', $jogador->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-4">
            <label class="block text-sm font-medium text-gray-700 mb-1">Nome *</label>
            <input type="text" name="nome" value="{{ old('nome', $jogador->nome) }}"
                   class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-green-500">
        </div>

        <div class="mb-4">
            <label class="block text-sm font-medium text-gray-700 mb-1">Posição *</label>
            <select name="posicao"
                    class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-green-500">
                <option value="">Selecione...</option>
                @foreach(['Goleiro','Lateral Direito','Lateral Esquerdo','Zagueiro','Volante','Meia','Atacante','Centroavante'] as $pos)
                    <option value="{{ $pos }}" {{ old('posicao', $jogador->posicao) == $pos ? 'selected' : '' }}>{{ $pos }}</option>
                @endforeach
            </select>
        </div>

        <div class="mb-4">
            <label class="block text-sm font-medium text-gray-700 mb-1">Número da Camisa *</label>
            <input type="number" name="numero_camisa" value="{{ old('numero_camisa', $jogador->numero_camisa) }}" min="1" max="99"
                   class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-green-500">
        </div>

        <div class="mb-4">
            <label class="block text-sm font-medium text-gray-700 mb-1">Data de Nascimento *</label>
            <input type="date" name="data_nascimento"
                   value="{{ old('data_nascimento', \Carbon\Carbon::parse($jogador->data_nascimento)->format('Y-m-d')) }}"
                   class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-green-500">
        </div>

        <div class="mb-6">
            <label class="block text-sm font-medium text-gray-700 mb-1">Nacionalidade *</label>
            <input type="text" name="nacionalidade" value="{{ old('nacionalidade', $jogador->nacionalidade) }}"
                   class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-green-500">
        </div>

        <div class="flex gap-3">
            <button type="submit"
                    class="bg-green-700 text-white px-6 py-2 rounded hover:bg-green-800">
                Atualizar
            </button>
            <a href="{{ route('jogadores.index') }}"
               class="bg-gray-300 text-gray-700 px-6 py-2 rounded hover:bg-gray-400">
                Cancelar
            </a>
        </div>
    </form>
</div>

@endsection