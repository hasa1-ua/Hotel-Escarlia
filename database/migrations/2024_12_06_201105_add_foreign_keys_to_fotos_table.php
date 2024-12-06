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
        Schema::table('fotos', function (Blueprint $table) {
            $table->foreignId('sala_id')->nullable()->constrained('salas')->onDelete('cascade');
            $table->foreignId('habitacion_id')->nullable()->constrained('habitaciones')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('fotos', function (Blueprint $table) {
            $table->dropForeign(['sala_id']);
            $table->dropForeign(['habitacion_id']);
            $table->dropColumn('sala_id');
            $table->dropColumn('habitacion_id');
        });
    }
};
