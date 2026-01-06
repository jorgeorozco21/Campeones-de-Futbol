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
        Schema::create('competiciones', function (Blueprint $table) {
            $table->id();
            $table->string("Nombre");
            $table->string("Logo");
            $table->mediumText("Descripcion");
            $table->unsignedBigInteger("ID_Pais");
            $table->enum("Tipo",['Liga','Copa','SuperCopa','Liguilla']);
            $table->unsignedBigInteger("ID_Confederacion");
            $table->timestamps();

            $table->foreign("ID_Pais")->references("id")->on("paises")->onDelete("cascade")->onUpdate("Cascade");
            $table->foreign("ID_Confederacion")->references("id")->on("confederaciones")->onDelete("cascade")->onUpdate("cascade");
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('competiciones');
    }
};
