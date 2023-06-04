<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHabitacionesTable extends Migration
{
    public function up()
    {
        Schema::create('habitaciones', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('hotel_id');
            $table->unsignedBigInteger('tipo_habitacion_id');
            $table->unsignedBigInteger('acomodacion_id');
            $table->integer('cantidad_habitaciones');
            $table->timestamps();

            $table->foreign('hotel_id')->references('id')->on('hoteles');
            $table->foreign('tipo_habitacion_id')->references('id')->on('tipos_habitacion');
            $table->foreign('acomodacion_id')->references('id')->on('acomodaciones');
        });
    }

    public function down()
    {
        Schema::dropIfExists('habitaciones');
    }
}
