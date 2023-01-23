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
        Schema::create('parejas', function (Blueprint $table) {
            $table->id();
            $table->string('nombre');
            $table->bigInteger('jugador1_id')->unsigned();
            $table->bigInteger('jugador2_id')->unsigned();
            $table->foreign('jugador1_id')->references('id')->on('jugadors');
            $table->foreign('jugador2_id')->references('id')->on('jugadors');
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
        Schema::dropIfExists('parejas');
    }
};
