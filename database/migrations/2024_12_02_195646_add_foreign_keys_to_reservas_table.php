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
        Schema::table('reservas', function (Blueprint $table) {
            $table->foreignId('usuario_id')->constrained('users')->onDelete('cascade');
            $table->foreignId('habitacion_id')->nullable()->constrained('habitaciones')->onDelete('cascade');
            $table->foreignId('sala_id')->nullable()->constrained('salas')->onDelete('cascade');
            $table->foreignId('regimen_id')->nullable()->constrained('regimenes')->onDelete('set null');
            $table->foreignId('temporada_id')->nullable()->constrained('temporadas')->onDelete('set null');
            $table->foreignId('cupon_id')->nullable()->constrained('cupones')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('reservas', function (Blueprint $table) {
            $table->dropForeign(['usuario_id']);
            $table->dropForeign(['habitacion_id']);
            $table->dropForeign(['sala_id']);
            $table->dropForeign(['regimen_id']);
            $table->dropForeign(['temporada_id']);
            $table->dropForeign(['cupon_id']);
            $table->dropColumn('usuario_id');
            $table->dropColumn('habitacion_id');
            $table->dropColumn('sala_id');
            $table->dropColumn('regimen_id');
            $table->dropColumn('temporada_id');
            $table->dropColumn('cupon_id');
        });
    }
};
