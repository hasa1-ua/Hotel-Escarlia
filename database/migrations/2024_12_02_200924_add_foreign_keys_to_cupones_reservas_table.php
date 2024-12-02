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
        Schema::table('cupon_reserva', function (Blueprint $table) {
            $table->foreignId('cupon_id')->constrained('cupon_reserva')->onDelete('cascade');
            $table->foreignId('reserva_id')->constrained('reservas')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('cupon_reserva', function (Blueprint $table) {
            $table->dropForeign(['cupon_id']);
            $table->dropForeign(['reserva_id']);
            $table->dropColumn('cupon_id');
            $table->dropColumn('reserva_id');
        });
    }
};
