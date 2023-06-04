<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHotelesTable extends Migration
{
    public function up()
    {
        Schema::create('hoteles', function (Blueprint $table) {
            $table->id();
            $table->string('nombre', 100)->unique();
            $table->string('direccion', 100);
            $table->string('ciudad', 100);
            $table->string('nit', 20);
            $table->integer('num_habitaciones');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('hoteles');
    }
}
