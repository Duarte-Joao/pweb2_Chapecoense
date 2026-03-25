@extends('layouts.app')

@section('content')


<div class="flex flex-col items-center text-center py-10">
    {{--<img src="{{ asset('images/Logo_Associação_Chapecoense_de_Futebol.svg.png') }}"
         alt="Escudo Chapecoense" class="h-32 w-32 object-contain mb-4 drop-shadow-lg">--}}
    <h1 class="text-4xl font-bold text-green-800">Associação Chapecoense de Futebol</h1>
    <p class="text-gray-500 mt-2 text-lg italic">Somos mais que 11.</p>
</div>

<div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-10">

    <a href="/socios" class="bg-white rounded-xl shadow hover:shadow-md transition p-6 flex items-center gap-4 border-l-4 border-green-600">
        <div class="bg-green-100 rounded-full p-4">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 text-green-700" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a4 4 0 00-4-4H6a4 4 0 00-4 4v2h5m6 0H9m3-10a4 4 0 100-8 4 4 0 000 8z"/>
            </svg>
        </div>
        <div>
            <p class="text-3xl font-bold text-green-800">{{ $totalSocios }}</p>
            <p class="text-gray-500 text-sm">Sócios cadastrados</p>
        </div>
    </a>

    <a href="/jogadores" class="bg-white rounded-xl shadow hover:shadow-md transition p-6 flex items-center gap-4 border-l-4 border-green-600">
        <div class="bg-green-100 rounded-full p-4">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 text-green-700" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/>
            </svg>
        </div>
        <div>
            <p class="text-3xl font-bold text-green-800">{{ $totalJogadores }}</p>
            <p class="text-gray-500 text-sm">Jogadores no elenco</p>
        </div>
    </a>

    <a href="/partidas" class="bg-white rounded-xl shadow hover:shadow-md transition p-6 flex items-center gap-4 border-l-4 border-green-600">
        <div class="bg-green-100 rounded-full p-4">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 text-green-700" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/>
            </svg>
        </div>
        <div>
            <p class="text-3xl font-bold text-green-800">{{ $totalPartidas }}</p>
            <p class="text-gray-500 text-sm">Partidas registradas</p>
        </div>
    </a>

</div>

<div class="bg-white rounded-xl shadow p-6">
    <h2 class="text-xl font-bold text-green-800 mb-4">Últimas Partidas</h2>

    @if($ultimasPartidas->isEmpty())
        <p class="text-gray-400 text-sm">Nenhuma partida cadastrada ainda.</p>
    @else
        <div class="overflow-x-auto">
            <table class="w-full text-sm">
                <thead>
                    <tr class="text-left text-gray-500 border-b">
                        <th class="pb-2">Adversário</th>
                        <th class="pb-2">Data</th>
                        <th class="pb-2">Competição</th>
                        <th class="pb-2 text-center">Placar</th>
                        <th class="pb-2">Resultado</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($ultimasPartidas as $partida)
                    <tr class="border-b hover:bg-gray-50">
                        <td class="py-3 font-medium">{{ $partida->adversario }}</td>
                        <td class="py-3 text-gray-500">{{ \Carbon\Carbon::parse($partida->data_partida)->format('d/m/Y') }}</td>
                        <td class="py-3 text-gray-500">{{ $partida->competicao }}</td>
                        <td class="py-3 text-center font-bold">
                            {{ $partida->gols_chapecoense }} x {{ $partida->gols_adversario }}
                        </td>
                        <td class="py-3">
                            @if($partida->gols_chapecoense > $partida->gols_adversario)
                                <span class="bg-green-100 text-green-700 text-xs font-semibold px-2 py-1 rounded-full">Vitória</span>
                            @elseif($partida->gols_chapecoense < $partida->gols_adversario)
                                <span class="bg-red-100 text-red-700 text-xs font-semibold px-2 py-1 rounded-full">Derrota</span>
                            @else
                                <span class="bg-gray-100 text-gray-600 text-xs font-semibold px-2 py-1 rounded-full">Empate</span>
                            @endif
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <div class="mt-4 text-right">
            <a href="/partidas" class="text-green-700 text-sm hover:underline">Ver todas as partidas →</a>
        </div>
    @endif
</div>

@endsection