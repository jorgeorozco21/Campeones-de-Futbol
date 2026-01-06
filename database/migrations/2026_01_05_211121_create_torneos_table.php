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
        Schema::create('torneos', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger("ID_Competicion");
            $table->string("Edicion");
            $table->unsignedBigInteger("ID_Equipo");
            $table->timestamps();

            $table->foreign("ID_Competicion")->references("id")->on("competiciones")->onDelete("cascade")->onUpdate("cascade");
            $table->foreign("ID_Equipo")->references("id")->on("equipos")->onDelete("cascade")->onUpdate("cascade");
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('torneos');
    }
};
