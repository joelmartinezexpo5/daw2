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
        Schema::create('animales_revisiones', function (Blueprint $table) {
            $table->id();
            $table->foreignId('animal_id')->constrained('animales')->onDelete('cascade'); // Relación con la tabla animales
            $table->date('fecha');
            $table->text('descripcion');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('animales_revisiones');
    }
};
