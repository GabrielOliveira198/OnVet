<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePacientes extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pacientes', function (Blueprint $table) {
            $table->id();
            $table->string('nome');
            $table->string('bairro');
            $table->string('endereco');
            $table->string('numero_casa');
            $table->string('email');
            $table->string('celular');
            $table->string('comentario');
            $table->string('etiquetas');
            $table->date('data_nascimento');
            $table->string('sexo');
            $table->string('cep');
            $table->string('cpf');
            $table->string('uf');
            $table->string('cidade');
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
        Schema::dropIfExists('pacientes');
    }
}
