<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
{
    Schema::create('animales', function (Blueprint $table) {
        $table->id();
        $table->string('especie')->unique();
        $table->string('slug')->unique();
        $table->double('peso', 6, 1);
        $table->double('altura', 6, 1);
        $table->date('fechaNacimiento');
        $table->string('imagen')->nullable();
        $table->string('alimentacion', 20)->nullable();
        $table->longText('descripcion')->nullable();
        $table->timestamps();
    });
}


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('animales');
    }
};
