<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SocioController;
use App\Http\Controllers\JogadorController;
use App\Http\Controllers\PartidaController;
use App\Models\Socio;
use App\Models\Jogador;
use App\Models\Partida;

Route::get('/', function () {
    return view('home', [
        'totalSocios' => Socio::count(),
        'totalJogadores' => Jogador::count(),
        'totalPartidas' => Partida::count(),
        'ultimasPartidas' => Partida::orderBy('data_partida', 'desc')->take(5)->get(),
    ]);
});

Route::get('/socios', [SocioController::class, 'index'])->name('socios.index');
Route::get('/socios/create', [SocioController::class, 'create'])->name('socios.create');
Route::post('/socios', [SocioController::class, 'store'])->name('socios.store');
Route::delete('/socios/{id}', [SocioController::class, 'destroy'])->name('socios.destroy');
Route::get('/socios/edit/{id}', [SocioController::class, 'edit'])->name('socios.edit');
Route::put('/socios/update/{id}', [SocioController::class, 'update'])->name('socios.update');
Route::post('/socios/search', [SocioController::class, 'search'])->name('socios.search');


Route::get('/jogadores', [JogadorController::class, 'index'])->name('jogadores.index');
Route::get('/jogadores/create', [JogadorController::class, 'create'])->name('jogadores.create');
Route::post('/jogadores', [JogadorController::class, 'store'])->name('jogadores.store');
Route::delete('/jogadores/{id}', [JogadorController::class, 'destroy'])->name('jogadores.destroy');
Route::get('/jogadores/edit/{id}', [JogadorController::class, 'edit'])->name('jogadores.edit');
Route::put('/jogadores/update/{id}', [JogadorController::class, 'update'])->name('jogadores.update');
Route::post('/jogadores/search', [JogadorController::class, 'search'])->name('jogadores.search');


Route::get('/partidas', [PartidaController::class, 'index'])->name('partidas.index');
Route::get('/partidas/create', [PartidaController::class, 'create'])->name('partidas.create');
Route::post('/partidas', [PartidaController::class, 'store'])->name('partidas.store');
Route::delete('/partidas/{id}', [PartidaController::class, 'destroy'])->name('partidas.destroy');
Route::get('/partidas/edit/{id}', [PartidaController::class, 'edit'])->name('partidas.edit');
Route::put('/partidas/update/{id}', [PartidaController::class, 'update'])->name('partidas.update');
Route::post('/partidas/search', [PartidaController::class, 'search'])->name('partidas.search');
