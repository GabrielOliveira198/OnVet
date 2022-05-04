<?php

namespace App\Http\Controllers\Data\Cadastro;

use App\Http\Controllers\Controller;
use App\Models\Cadastro\Inducao;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Exception;

class InducaoController extends Controller
{
    protected $model = Inducao::class;
    public function save(Request $request)
    {
        try {
            $inducao = $this->model::findOrNew($request->id);
            $inducao->nome = $request->nome;
            $inducao->desc = $request->desc;
            $inducao->save();
            return $inducao;
        } catch (Exception $ex) {
            return response()->json([
                'message' => 'Ocorreu um Erro ao salvar o protocolo!',
                'exception' => $ex->getMessage()
            ], 404);
        }
    }
}