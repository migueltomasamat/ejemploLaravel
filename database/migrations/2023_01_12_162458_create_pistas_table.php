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
        Schema::create('pistas', function (Blueprint $table) {
            $table->id();
            $table->boolean('luz')->default(true)->nullable();
            $table->float('precioLuz',unsigned: true)->nullable()->default(null);
            $table->boolean('cubierta')->default(false)->nullable();
            $table->boolean('disponible')->default(true)->nullable();
            $table->enum('tipoPista',['Individual','Dobles']);
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
        Schema::dropIfExists('pistas');
    }
};
