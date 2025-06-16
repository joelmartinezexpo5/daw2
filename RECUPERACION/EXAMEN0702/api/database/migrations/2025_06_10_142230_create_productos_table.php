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
        Schema::create('productos', function (Blueprint $table) {
            $table->id();
            $table->string('titulo')->unique();
            $table->longText('descripcion');
            $table->string('slug')->unique();
            $table->Integer('precio');
            $table->unsignedBigInteger('imagen_id')->nullable();
            $table->unsignedBigInteger('familia_id');
            $table->timestamps();
            $table->foreign('imagen_id')->references('id')->on('imagenes')->onDelete('cascade');
            $table->foreign('familia_id')->references('id')->on('familias');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('productos');
    }
};
