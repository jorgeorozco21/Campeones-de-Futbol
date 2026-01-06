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
        Schema::create('resultados_eliminacion', function (Blueprint $table) {
            $table->id();
            $table->string("Resultado1");
            $table->string("Resultado2")->nullable();
            $table->string("Resultado3")->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('resultados_eliminacion');
    }
};
