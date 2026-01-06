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
        Schema::create('fases_de_eliminacion', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger("ID_Equipo1");
            $table->unsignedBigInteger("ID_Equipo2");
            $table->enum("Tipo",['idaVuelta','playOff','eliminacionDirecta']);
            $table->unsignedBigInteger("ID_Torneo");
            $table->unsignedBigInteger("ID_Resultado");
            $table->timestamps();

            $table->foreign("ID_Equipo1")->references("id")->on("equipos")->onDelete("cascade")->onUpdate("cascade");
            $table->foreign("ID_Equipo2")->references("id")->on("equipos")->onDelete("cascade")->onUpdate("cascade");
            $table->foreign("ID_Torneo")->references("id")->on("torneos")->onDelete("cascade")->onUpdate("cascade");
            $table->foreign("ID_Resultado")->references("id")->on("resultados_eliminacion")->onDelete("cascade")->onUpdate("cascade");
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('fases_de_eliminacion');
    }
};
