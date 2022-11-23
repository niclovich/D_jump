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
        Schema::create('articulos', function (Blueprint $table) {
            $table->id();
            $table->string('articulo_nom');
            $table->string('image_url');
            $table->text('articulo_descripcion');
            $table->text('stock');
            $table->text('estado');
            $table->unsignedBigInteger('precioxmayor');
            $table->unsignedBigInteger('precioxmenor');
            $table->unsignedBigInteger('cantidadminima');
            $table->unsignedBigInteger('comercio_id');
            $table->unsignedBigInteger('categoria_id');
            $table->foreign('comercio_id')->references('id')->on('comercios');
            $table->foreign('categoria_id')->references('id')->on('categoria_articulos');
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
        Schema::dropIfExists('articulos');
    }
};
