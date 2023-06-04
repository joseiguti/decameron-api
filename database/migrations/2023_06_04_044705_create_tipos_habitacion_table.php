<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTiposHabitacionTable extends Migration
{
    public function up()
    {
        Schema::create('tipos_habitacion', function (Blueprint $table) {
            $table->id();
            $table->string('nombre', 20)->unique();
            $table->timestamps();
        });

        DB::table('tipos_habitacion')->insert([
            ['nombre' => 'Estándar'],
            ['nombre' => 'Junior'],
            ['nombre' => 'Suite'],
        ]);
    }

    public function down()
    {
        Schema::dropIfExists('tipos_habitacion');
    }
}
