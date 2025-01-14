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
        Schema::table('inscripciones', function (Blueprint $table) {
            Schema::table('inscripciones', function (Blueprint $table) {
                $table->unsignedBigInteger('modulo_id')->nullable();
                $table->boolean('completado')->default(false);
                $table->foreign('modulo_id')->references('id')->on('modulos')->onDelete('cascade');
            });
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('inscripciones', function (Blueprint $table) {
            $table->dropForeign(['modulo_id']);
            $table->dropColumn('modulo_id');
            $table->dropColumn('completado');
        });
    }
};
