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
        Schema::create('comercios', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->string('comercio_nom')->nullable();
            $table->string('image_url');
            $table->text('comercio_descripcion');
            $table->string('comercio_horario');
            $table->string('comercio_telefono');
            $table->string('estado');
            $table->double('longitud');
            $table->double('latitud');
            $table->timestamps();
            $table->foreign('user_id')->references('id')->on('users');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('comercios');
    }
};
