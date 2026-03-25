<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Partida extends Model
{
    use HasFactory;

    protected $table = 'partidas';
    protected $fillable = [
        'adversario',
        'data_partida',
        'estadio',
        'competicao',
        'gols_chapecoense',
        'gols_adversario',
        'jogador_id',       // artilheiro da partida
    ];

    /**
     * Uma partida pertence a um jogador (artilheiro).
     * O relacionamento é nullable — partida pode não ter artilheiro cadastrado.
     */
    public function artilheiro()
    {
        return $this->belongsTo(Jogador::class, 'jogador_id');
    }
}