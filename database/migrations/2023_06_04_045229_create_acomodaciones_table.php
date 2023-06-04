<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAcomodacionesTable extends Migration
{
    public function up()
    {
        Schema::create('acomodaciones', function (Blueprint $table) {
            $table->id();
            $table->string('nombre', 20)->unique();
            $table->timestamps();
        });

        DB::table('acomodaciones')->insert([
            ['nombre' => 'Sencilla'],
            ['nombre' => 'Doble'],
            ['nombre' => 'Triple'],
            ['nombre' => 'Cuádruple'],
        ]);
    }

    public function down()
    {
        Schema::dropIfExists('acomodaciones');
    }
}
