<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Productos extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('productos', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('cantidades')->nullable($value=false);
            $table->string('nombres')->nullable($value = false)->collation('utf8_spanish2_ci');
            $table->bigInteger('fid_menus')->nullable($value=false)->unsigned();
            $table->foreign('fid_menus')->references('id')->on('menus')->onDelete('cascade');

            $table->unsignedBigInteger('ingredientes')->nullable();
            $table->foreign('ingredientes')->references('id')->on('ingredientes');

            $table->bigInteger('precios')->nullable($value=false);
            $table->string('descripciones')->nullable($value=false);
            $table->bigInteger('codigos')->nullable($value=false);
            $table->string('rutas_imagenes')->nullable($value = false)->collation('utf8_spanish2_ci');
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
        Schema::dropIfExists('productos');
    }
}
