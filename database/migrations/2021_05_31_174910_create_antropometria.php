<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAntropometria extends Migration
{

    public function up()
    {
        Schema::create('antropometria', function (Blueprint $table) {
            $table->id();
            //Dados antropométricos básicos
            $table->string('peso_atual');
            $table->string('estatura');
            $table->string('estatura_sentado');
            //Dobras cutâneas
            $table->string('dobra_tricipital');
            $table->string('dobra_bicipital');
            $table->string('dobra_abdominal');
            $table->string('dobra_subescapular');
            $table->string('dobra_auxiliar_media');
            $table->string('dobra_coxa');
            $table->string('dobra_toracica');
            $table->string('dobra_suprailiaca');
            $table->string('dobra_panturilha');
            $table->string('dobra_supraespinhal');
          
            //Circunferências corporais
            $table->string('circunferencia_torax');
            $table->string('circunferencia_ombro');
            $table->string('circunferencia_cintura');
            $table->string('circunferencia_quadril');
            $table->string('circunferencia_abdomen');
            $table->string('circunferencia_braco_relaxado');
            $table->string('circunferencia_braco_contraido');
            $table->string('circunferencia_antebraco');
            $table->string('circunferencia_coxa_proximal');
            $table->string('circunferencia_coxa_medial');
            $table->string('circunferencia_coxa_distal');
            $table->string('circunferencia_panturilha');
         
            //Diâmetro osseo
            $table->string('diametro_umero');
            $table->string('diametro_punho');
            $table->string('diametro_femur');

            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('antropometria');
    }
}
