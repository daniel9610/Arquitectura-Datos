<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Cliente extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cliente', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('nombres')->nullable($value = false)->collation('utf8_spanish2_ci');
            $table->string('apellidos')->nullable($value = false)->collation('utf8_spanish2_ci');
            $table->bigInteger('cedula')->nullable($value=false);
            $table->bigInteger('fid_carrito')->nullable($value=false)->unsigned();
            $table->foreign('fid_carrito')->references('id')->on('carrito')->onDelete('cascade');
            $table->string('direcciones_IP')->nullable($value = false)->collation('utf8_spanish2_ci');
            $table->string('direcciones')->nullable($value = false)->collation('utf8_spanish2_ci');
            $table->bigInteger('totales_cancelados_por_productos')->nullable($value=false);
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
        Schema::dropIfExists('cliente');
    }
}
