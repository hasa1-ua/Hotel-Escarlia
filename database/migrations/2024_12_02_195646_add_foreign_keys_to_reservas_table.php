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
            $table->dropColumn('usuario_id');
            $table->dropColumn('habitacion_id');
            $table->dropColumn('sala_id');
        });
    }
};
