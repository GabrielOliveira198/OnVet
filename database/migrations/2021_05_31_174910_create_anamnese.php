<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAnamnese extends Migration
{

    public function up()
    {
        Schema::create('anamnese', function (Blueprint $table) {
            $table->id();
            $table->string('conteudo');
            $table->text('nome_anamnese');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('anamnese');
    }
}
