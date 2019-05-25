<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Carrito extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('carrito', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('codigos')->nullable($value=false);
            $table->bigInteger('fid_productos')->nullable($value=false)->unsigned();
            $table->foreign('fid_productos')->references('id')->on('productos')->onDelete('cascade');
            $table->string('direcciones_IP')->nullable($value = false)->collation('utf8_spanish2_ci');
            $table->bigInteger('cantidades_agregadas')->nullable($value=false)->unsigned();
            $table->string('estados')->nullable($value=false)->collation('utf8_spanish2_ci');
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
        Schema::dropIfExists('carrito');
    }
}
