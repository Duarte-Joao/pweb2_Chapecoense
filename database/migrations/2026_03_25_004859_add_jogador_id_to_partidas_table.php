<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('partidas', function (Blueprint $table) {
            $table->foreignId('jogador_id')
                  ->nullable()
                  ->constrained('jogadores')
                  ->nullOnDelete();
        });
    }

    public function down(): void
    {
        Schema::table('partidas', function (Blueprint $table) {
            $table->dropForeign(['jogador_id']);
            $table->dropColumn('jogador_id');
        });
    }
};