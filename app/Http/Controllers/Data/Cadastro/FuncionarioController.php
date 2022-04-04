<?php

namespace App\Http\Controllers\Data\Funcionario;

use App\Http\Controllers\Controller;
use App\Models\Paciente\Funcionario;
use Illuminate\Http\Request;

use Exception;

class FuncionarioController extends Controller
{
    protected $model = Funcionario::class;
    public function save(Request $request)
    {
        try {
            $funcionario = $this->model::findOrNew($request->id);
            $funcionario->nome = $request->nome;
            $funcionario->bairro = $request->bairro;
            $funcionario->endereco = $request->endereco;
            $funcionario->numero_casa = $request->numero_casa;
            $funcionario->email = $request->email;
            $funcionario->celular = $request->celular;
            $funcionario->tel_residencial = $request->tel_residencial;
            $funcionario->funcao = $request->funcao;
            $funcionario->data_nascimento = $request->data_nascimento;
            $funcionario->sexo = $request->sexo;
            $funcionario->cep = $request->cep;
            $funcionario->cpf = $request->cpf;
            $funcionario->uf = $request->uf;
            $funcionario->cidade = $request->cidade;

            $funcionario->save();

            return $funcionario;
        } catch (Exception $ex) {
            return response()->json([
                'message' => 'Ocorreu um Erro ao salvar o Paciente!',
                'exception' => $ex->getMessage()], 404);
        }
    }
}
