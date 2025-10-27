<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('acordos', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_proposta')->constrained('propostas')->onDelete('cascade')->onUpdate('cascade');
            $table->String('anuncio');
            $table->String('categoria_acordo');
            $table->String('data_encontro');
            $table->String('local_encontro');
            $table->String('imagem_acordo');
            $table->tinyInteger('status_acordo');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('acordos');
    }
};
