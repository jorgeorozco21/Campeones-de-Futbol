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
        Schema::table('fases_de_eliminacion', function (Blueprint $table) {
            $table->enum("Fase",['1','2','4','8','16','32']);
            $table->integer("Llave");
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('fases_de_eliminacion', function (Blueprint $table) {
            $table->dropColumn(['Fase', 'Llave']);
        });
    }
};
