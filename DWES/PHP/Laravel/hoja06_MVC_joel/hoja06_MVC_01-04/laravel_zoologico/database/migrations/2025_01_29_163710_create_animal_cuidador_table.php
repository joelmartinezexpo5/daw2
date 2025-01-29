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
        Schema::create('animal_cuidador', function (Blueprint $table) {
            $table->foreignId('animal_id')->constrained('animales')->onDelete('cascade');  // Referencia a 'animals'
            $table->foreignId('cuidador_id')->constrained('cuidadors')->onDelete('cascade');  // Referencia a 'cuidadores'
            $table->primary(['animal_id', 'cuidador_id']);  // Llave primaria compuesta
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('animal_cuidador');
    }
};
