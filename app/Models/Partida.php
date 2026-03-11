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
        'gols_adversario'
    ];
}
