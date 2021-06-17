<?php

namespace App\Http\Controllers\Data\TudoNutri;

use App\Http\Controllers\Controller;
use App\Models\TudoNutri\Metas;
use Illuminate\Http\Request;

use Exception;

class MetasController extends Controller
{
    protected $model = Metas::class;
    public function save(Request $request)
    {
        try {
            $metas = $this->model::findOrNew($request->id);
            $metas->nome_metas = $request->nome_metas;
            $metas->descricao = $request->descricao;
            $metas->data_inicio = $request->data_inicio;
            $metas->data_termino = $request->data_termino;
            $metas->frequencia = $request->frequencia;
            $metas->vezes_por = $request->vezes_por; 
            $metas->save();
            return $metas;
        } catch (Exception $ex) {
            return response()->json([
                'message' => 'Ocorreu um Erro ao salvar a Meta!',
                'exception' => $ex->getMessage()
            ], 404);
        }
    }
}
