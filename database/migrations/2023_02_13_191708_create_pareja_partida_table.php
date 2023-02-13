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
        Schema::create('pareja_partida', function (Blueprint $table) {
            $table->id();
            $table->foreignId('partida_id')->constrained();
            $table->foreignId('pareja_id')->constrained();
            $table->enum('sorteo_saque',['cara','cruz']);
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
        Schema::dropIfExists('pareja_partida');
    }
};
