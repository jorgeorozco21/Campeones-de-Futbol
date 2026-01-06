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
        Schema::create('resultados', function (Blueprint $table) {
            $table->id();
            $table->integer("Ganados");
            $table->integer("Perdidos");
            $table->integer("Empates");
            $table->integer("GA");
            $table->integer("GC");
            $table->integer("DG");
            $table->integer("Puntos");
            $table->enum("Clasificacion",['Descenso','Campeon','Champions','Europa','Conferens','Recopa']);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('resultados');
    }
};
