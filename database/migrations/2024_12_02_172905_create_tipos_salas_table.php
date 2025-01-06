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
        Schema::create('tipo_salas', function (Blueprint $table) {
            $table->id();
            $table->string('nombre');
            $table->integer('aforo');
            $table->text('descripcion')->nullable();
            $table->decimal('precio', 5, 2);
            $table->longText('img');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tipo_salas');
    }
};
