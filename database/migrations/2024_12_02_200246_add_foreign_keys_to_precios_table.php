<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('precios', function (Blueprint $table) {
            $table->foreignId('tipo_habitacion_id')->nullable()->constrained('tipos_habitaciones')->onDelete('cascade');
            $table->foreignId('tipo_sala_id')->nullable()->constrained('tipos_salas')->onDelete('cascade');
            $table->foreignId('temporada_id')->constrained('temporadas')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('precios', function (Blueprint $table) {
            $table->dropForeign(['tipo_habitacion_id']);
            $table->dropForeign(['tipo_sala_id']);
            $table->dropForeign(['temporada_id']);
            $table->dropColumn('tipo_habitacion_id');
            $table->dropColumn('tipo_sala_id');
            $table->dropColumn('temporada_id');
        });
    }
};
