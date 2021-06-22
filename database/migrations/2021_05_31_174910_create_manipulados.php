<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateManipulados extends Migration
{

    public function up()
    {
        Schema::create('manipulados', function (Blueprint $table) {
            $table->id();
            $table->string('formula');
            $table->text('nome_formula');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('manipulados');
    }
}
