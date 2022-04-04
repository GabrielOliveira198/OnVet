<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFuncionarios extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('funcionarios', function (Blueprint $table) {
            $table->id();
            $table->string('nome',100);
            $table->string('bairro',50);
            $table->string('endereco',100);
            $table->integer('numero_casa');
            $table->string('email',100);
            $table->string('celular',11);
            $table->string('tel_residencial',11);
            $table->string('funcao',50);
            $table->string('data_nascimento');
            $table->string('sexo',20);
            $table->string('cep',20);
            $table->string('cpf',20);
            $table->string('uf',2);
            $table->string('cidade',50);
            $table->tinyInteger('ativo');
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
        Schema::dropIfExists('funcionarios');
    }
}
