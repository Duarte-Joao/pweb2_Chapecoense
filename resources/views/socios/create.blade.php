@extends('layouts.app')

@section('content')

<div class="max-w-lg mx-auto bg-white rounded shadow p-6">
    <h1 class="text-2xl font-bold text-green-700 mb-6">Cadastrar Sócio</h1>

    @if($errors->any())
        <div class="bg-red-100 text-red-700 border border-red-300 px-4 py-3 rounded mb-4">
            <ul class="list-disc list-inside text-sm">
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('socios.store') }}" method="POST">
        @csrf

        <div class="mb-4">
            <label class="block text-sm font-medium text-gray-700 mb-1">Nome *</label>
            <input type="text" name="nome" value="{{ old('nome') }}"
                   class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-green-500">
        </div>

        <div class="mb-4">
            <label class="block text-sm font-medium text-gray-700 mb-1">CPF * <span class="text-gray-400 font-normal">(somente números, 11 dígitos)</span></label>
            <input type="text" name="cpf" value="{{ old('cpf') }}" maxlength="11" placeholder="00000000000"
                   class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-green-500">
        </div>

        <div class="mb-4">
            <label class="block text-sm font-medium text-gray-700 mb-1">E-mail *</label>
            <input type="email" name="email" value="{{ old('email') }}"
                   class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-green-500">
        </div>

        <div class="mb-4">
            <label class="block text-sm font-medium text-gray-700 mb-1">Telefone *</label>
            <input type="text" name="telefone" value="{{ old('telefone') }}" placeholder="(xx) xxxxx-xxxx"
                   class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-green-500">
        </div>

        <div class="mb-4">
            <label class="block text-sm font-medium text-gray-700 mb-1">Categoria *</label>
            <select name="categoria_socio"
                    class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-green-500">
                <option value="">Selecione...</option>
                @foreach(['Geral', 'Cadeira Lateral', 'Cadeira Central'] as $cat)
                    <option value="{{ $cat }}" {{ old('categoria_socio') == $cat ? 'selected' : '' }}>{{ $cat }}</option>
                @endforeach
            </select>
        </div>

        <div class="mb-6">
            <label class="block text-sm font-medium text-gray-700 mb-1">Data de Associação *</label>
            <input type="date" name="data_associacao" value="{{ old('data_associacao') }}"
                   class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-green-500">
        </div>

        <div class="flex gap-3">
            <button type="submit" class="bg-green-700 text-white px-6 py-2 rounded hover:bg-green-800">Salvar</button>
            <a href="{{ route('socios.index') }}" class="bg-gray-300 text-gray-700 px-6 py-2 rounded hover:bg-gray-400">Cancelar</a>
        </div>
    </form>
</div>

@endsection