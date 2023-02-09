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
        Schema::create('jugadors', function (Blueprint $table) {
            $table->id();
            $table->integer('nivelJuego')->nullable()->default(null);
            $table->enum('manoHabil',['Izquierda','Derecha'])->nullable()->default('Derecha');
            $table->enum('ladoPreferido',['Izquierdo','Derecho','Indiferente'])->nullable()->default('Indiferente');
            $table->integer('indiceResponsabilidad')->nullable()->default('100');
            $table->integer('numFederado')->nullable()->default(null);
            $table->boolean('renovacionAutomatica')->default(true)->nullable();
            $table->bigInteger('user_id')->unsigned()->nullable()->unique()->default(null);
            $table->foreign('user_id')->references('id')->on('users');
            $table->boolean('partidasMixtas')->default(true)->nullable();
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
        Schema::dropIfExists('jugadors');
    }
};
