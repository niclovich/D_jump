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
        Schema::create('pedidos', function (Blueprint $table) {
            $table->id();
            $table->text('estado');
            $table->double('totalpedido');
            $table->unsignedBigInteger('venta_id');
            $table->unsignedBigInteger('comercio_id');
            $table->timestamps();
            $table->foreign('venta_id')->references('id')->on('ventas');
            $table->foreign('comercio_id')->references('id')->on('comercios');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pedidos');
    }
};
