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
        Schema::create('detallepedidos', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('cantidad');
            $table->unsignedBigInteger('articulo_id');
            $table->unsignedBigInteger('pedido_id');
            $table->foreign('articulo_id')->references('id')->on('articulos');
            $table->foreign('pedido_id')->references('id')->on('pedidos');

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
        Schema::dropIfExists('detallepedidos');
    }
};
