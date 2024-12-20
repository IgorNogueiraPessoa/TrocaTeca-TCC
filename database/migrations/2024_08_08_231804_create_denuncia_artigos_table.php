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
        Schema::create('denuncia_artigos', function (Blueprint $table) {
            $table->foreignId('id_artigo')->constrained('artigos')->onDelete('cascade')->onUpdate('cascade');
            $table->foreignId('id_denuncia')->constrained('denuncias')->onDelete('cascade')->onUpdate('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('denuncia_artigos');
    }
};
