<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTiposHabitacionAcomodacionesTable extends Migration
{
    public function up()
    {
        Schema::create('tipos_habitacion_acomodaciones', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('tipo_habitacion_id');
            $table->unsignedBigInteger('acomodacion_id');
            $table->timestamps();

            $table->foreign('tipo_habitacion_id')->references('id')->on('tipos_habitacion');
            $table->foreign('acomodacion_id')->references('id')->on('acomodaciones');
        });

        DB::table('tipos_habitacion_acomodaciones')->insert([
            ['tipo_habitacion_id' => 1, 'acomodacion_id' => 1],
            ['tipo_habitacion_id' => 1, 'acomodacion_id' => 2],
            ['tipo_habitacion_id' => 2, 'acomodacion_id' => 3],
            ['tipo_habitacion_id' => 2, 'acomodacion_id' => 4],
            ['tipo_habitacion_id' => 3, 'acomodacion_id' => 1],
            ['tipo_habitacion_id' => 3, 'acomodacion_id' => 2],
            ['tipo_habitacion_id' => 3, 'acomodacion_id' => 3],
        ]);
    }

    public function down()
    {
        Schema::dropIfExists('tipos_habitacion_acomodaciones');
    }
}
