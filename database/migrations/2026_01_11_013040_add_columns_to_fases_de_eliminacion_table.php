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
            $table->string('Fase');
            $table->string('Llave');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('fases_de_eliminacion', function (Blueprint $table) {
            $table->dropColumn(['Fase','Llave']);
        });
    }
};
