<?php

namespace App\Http\Controllers\Data\Paciente;

use App\Http\Controllers\Controller;
use App\Models\Paciente\Paciente;
use Illuminate\Http\Request;

use Exception;

class PacienteController extends Controller
{
    protected $model = Paciente::class;
    public function save(Request $request)
    {
        try {
            $paciente = $this->model::findOrNew($request->id);
            $paciente->nome = $request->nome;
            $paciente->bairro = $request->bairro;
            $paciente->endereco = $request->endereco;
            $paciente->numero_casa = $request->numero_casa;
            $paciente->email = $request->email;
            $paciente->celular = $request->celular;
            $paciente->comentario = $request->comentario; 
            $paciente->etiquetas = $request->etiquetas;
            $paciente->data_nascimento = $request->data_nascimento;
            $paciente->sexo = $request->sexo;
            $paciente->cep = $request->cep;
            $paciente->cpf = $request->cpf;
            $paciente->uf = $request->uf;
            $paciente->cidade = $request->cidade;

            $paciente->save();

            return $paciente;
        } catch (Exception $ex) {
            return response()->json([
                'message' => 'Ocorreu um Erro ao salvar o Paciente!',
                'exception' => $ex->getMessage()], 404);
        }
    }
}
