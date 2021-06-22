<?php

namespace App\Http\Controllers\Data\TudoNutri;

use App\Http\Controllers\Controller;
use App\Models\TudoNutri\Manipulados;
use Illuminate\Http\Request;

use Exception;

class ManipuladosController extends Controller
{
    protected $model = Manipulados::class;
    public function save(Request $request)
    {
        try {
            $manipulados = $this->model::findOrNew($request->id);
            $manipulados->nome_formula = $request->nome_formula;
            $manipulados->formula = $request->formula;
            $manipulados->save();
            return $manipulados;
        } catch (Exception $ex) {
            return response()->json([
                'message' => 'Ocorreu um Erro ao salvar !',
                'exception' => $ex->getMessage()
            ], 404);
        }
    }
}
