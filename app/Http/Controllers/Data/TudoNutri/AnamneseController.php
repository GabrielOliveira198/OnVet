<?php

namespace App\Http\Controllers\Data\TudoNutri;

use App\Http\Controllers\Controller;
use App\Models\TudoNutri\Anamnese;
use Illuminate\Http\Request;

use Exception;

class AnamneseController extends Controller
{
    protected $model = Anamnese::class;
    public function save(Request $request)
    {
        try {
            $anamnese = $this->model::findOrNew($request->id);
            $anamnese->nome_anamnese = $request->nome_anamnese;
            $anamnese->conteudo = $request->conteudo;
            $anamnese->save();
            return $anamnese;
        } catch (Exception $ex) {
            return response()->json([
                'message' => 'Ocorreu um Erro ao salvar a Anamnese!',
                'exception' => $ex->getMessage()
            ], 404);
        }
    }
}
