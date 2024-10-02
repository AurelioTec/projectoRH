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
        Schema::create('recrutamentos', function (Blueprint $table) {
            $table->id();
            $table->String('nome');
            $table->String('categoria');
            $table->date('datanascimento');
            $table->String('telefone')->unique();
            $table->String('email')->unique();
            $table->String('nbi')->unique();
            $table->enum('genero', ['Masculino', 'Femenino']);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('recrutamentos');
    }
};
