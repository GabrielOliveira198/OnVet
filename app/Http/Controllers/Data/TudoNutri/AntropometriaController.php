<?php

namespace App\Http\Controllers\Data\TudoNutri;

use App\Http\Controllers\Controller;
use App\Models\TudoNutri\Antropometria;
use Illuminate\Http\Request;

use Exception;

class AntropometriaController extends Controller
{
    protected $model = Antropometria::class;
    public function save(Request $request)
    {
        try {
            $antropometria = $this->model::findOrNew($request->id);
            //Dados antropométricos básicos
            $antropometria->peso_atual = $request->peso_atual;
            $antropometria->estatura = $request->estatura;
            $antropometria->estatura_sentado = $request->estatura_sentado;
            //Dobras cutâneas
            $antropometria->dobra_tricipital = $request->dobra_tricipital;
            $antropometria->dobra_bicipital= $request->dobra_bicipital;
            $antropometria->dobra_abdominal = $request->dobra_abdominal;
            $antropometria->dobra_subescapular = $request->dobra_subescapular;
            $antropometria->dobra_auxiliar_media = $request->dobra_auxiliar_media;
            $antropometria->dobra_coxa = $request->dobra_coxa;
            $antropometria->dobra_toracica = $request->dobra_toracica;
            $antropometria->dobra_suprailiaca= $request->dobra_suprailiaca;
            $antropometria->dobra_panturilha= $request->dobra_panturilha;
            $antropometria->dobra_supraespinhal = $request->dobra_supraespinhal;
          
            //Circunferências corporais
            $antropometria->circunferencia_torax = $request->circunferencia_torax;
            $antropometria->circunferencia_ombro = $request->circunferencia_ombro;
            $antropometria->circunferencia_cintura = $request->circunferencia_cintura;
            $antropometria->circunferencia_quadril = $request->circunferencia_quadril;
            $antropometria->circunferencia_abdomen = $request->circunferencia_abdomen;
            $antropometria->circunferencia_braco_relaxado = $request->circunferencia_braco_relaxado;
            $antropometria->circunferencia_braco_contraido = $request->circunferencia_braco_contraido;
            $antropometria->circunferencia_antebraco = $request->circunferencia_antebraco;
            $antropometria->circunferencia_coxa_proximal = $request->circunferencia_coxa_proximal;
            $antropometria->circunferencia_coxa_medial = $request->circunferencia_coxa_medial;
            $antropometria->circunferencia_coxa_distal = $request->circunferencia_coxa_distal;
            $antropometria->circunferencia_panturilha = $request->circunferencia_panturilha;
         
            //Diâmetro osseo
            $antropometria->diametro_umero = $request->diametro_umero;
            $antropometria->diametro_punho= $request->diametro_punho;
            $antropometria->diametro_femur = $request->diametro_femur;
            
            $antropometria->save();
            return $antropometria;
            
        } catch (Exception $ex) {
            return response()->json([
                'message' => 'Ocorreu um Erro ao salvar !',
                'exception' => $ex->getMessage()
            ], 404);
        }
    }
}
