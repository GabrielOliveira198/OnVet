@extends('layouts/contentLayoutMaster')

@section('title', 'Paciente')

@section('content')   

<div class="row">
    <div class="col-lg-12 col-12">
        <div class="card">
            <div class="card-header">
                <h3>
                    Cadastro de Pacientes
                </h3>
            </div>
            <div class="card-body">
                <form id="formPacienteData" action="{{ url('data/paciente/pacientes/save') }}" class="form">
                    <input type="hidden" name="id" id="id" value="{{ $paciente->id ?? '0' }}" />
                    <div class="row">
                        <div class="col-6">
                            <div class="form-group">
                                <label class="form-label" for="nome">nome</label>
                                <input type="text" name="nome" class="form-control" id="nome"
                                    placeholder="Digite o nome completo" value="{{ $paciente->nome ?? '' }}" />
                            </div>
                        </div>
                        <div class="col-6">
						<div class="form-group">
                                <label class="form-label" for="nome">CPF</label>
                                <input type="text" name="cpf" class="form-control" id="cpf"
                                    placeholder="Digite o cpf" value="{{ $paciente->cpf ?? '' }}" />
                            </div>
                        </div>
                    </div>
					<div class="row">
					      <div class="col-6">
                            <div class="form-group">
                                <label class="form-label" for="nome">Data de nascimento</label>
                                <input type="date" name="data_nascimento" class="form-control" id="data_nascimento"
                                    placeholder="Digite a data de nascimento" value="{{ $paciente->data_nascimento ?? '' }}" />
                            </div>
                        </div>
					<div class="col-6">
						<div class="form-group">
                        <label class="form-label" for="nome">Sexo</label>
                                <input type="text" name="sexo" class="form-control" id="sexo"
                                    placeholder="Digite o sexo" value="{{ $paciente->sexo ?? '' }}" />
                            </div>
                        </div>
                      </div> 	
				  <div class="row">
                        <div class="col-6">
                            <div class="form-group">
                                <label class="form-label" for="nome">cep</label>
                                <input type="text" name="cep" class="form-control" placeholder="Digite o cep" 
								 id="cep" value="{{ $paciente->cep ?? ''}}" />
                            </div>
                        </div>
                        <div class="col-6">
						<div class="form-group">
                                <label class="form-label" for="nome">Endereço</label>
                                <input type="text" name="endereco" class="form-control" id="endereco"
                                    placeholder="Digite o endereco" value="{{ $paciente->endereco ?? '' }}" />
                            </div>
                        </div>
                    </div>
					<div class="row">
                        <div class="col-6">
                            <div class="form-group">
                                <label class="form-label" for="nome">Número</label>
                                <input type="text" name="numero_casa" class="form-control" placeholder="Digite o número da casa" 
								 id="numero_casa" value="{{ $paciente->numero_casa ?? ''}}" />
                            </div>
                        </div>
                        <div class="col-6">
						<div class="form-group">
                                <label class="form-label" for="nome">Bairro</label>
                                <input type="text" name="bairro" class="form-control" id="bairro"
                                    placeholder="Digite o bairro" value="{{ $paciente->bairro ?? '' }}" />
                            </div>
                        </div>
                    </div>
					<div class="row">
                        <div class="col-6">
                            <div class="form-group">
                                <label class="form-label" for="nome">Estado</label>
                                <input type="text" name="uf" class="form-control" placeholder="Digite o UF" 
								 id="uf" value="{{ $paciente->uf ?? ''}}" />
                            </div>
                        </div>
                        <div class="col-6">
						<div class="form-group">
                                <label class="form-label" for="nome">Cidade</label>
                                <input type="text" name="cidade" class="form-control" id="cidade"
                                    placeholder="Digite a cidade" value="{{ $paciente->cidade ?? '' }}" />
                            </div>
                        </div>
                    </div>
					<div class="row">
                        <div class="col-6">
                            <div class="form-group">
                                <label class="form-label" for="nome">Celular</label>
                                <input type="text" name="celular" class="form-control" placeholder="Digite o número de celular" 
								 id="celular" value="{{ $paciente->celular ?? ''}}" />
                            </div>
                        </div>
                        <div class="col-6">
						<div class="form-group">
                                <label class="form-label" for="nome">Etiquetas</label>
                                <input type="text" name="etiquetas" class="form-control" id="etiquetas"
                                    placeholder="Defina etiquetas para o paciente: sedentário" value="{{ $paciente->etiquetas ?? '' }}" />
                            </div>
                        </div>
                    </div>
					<div class="row">
				    	<div class="col-6">
						<label class="form-label" for="nome">E-mail</label>
                            <input type="text" name="email" class="form-control" id="email"
                            placeholder="Digite o e-mail" value="{{ $paciente->email ?? '' }}" /> 
		    			</div>
					</div>	
					<br>
					<div class="row">
				    	<div class="col-6">
						<label class="form-label" for="nome">Comentários</label>
                                <textarea class="form-control" name="comentario" rows="7"
                                    placeholder="Deixe um comentário sobre este paciente">{{ $paciente->comentario ?? '' }}</textarea>
		    			</div>
					</div>	
                    <div class="row">&nbsp;</div>
                    <div class="row">
                        <div class="col-md-6 col-12">
                            <button type="submit" class="btn btn-primary data-submit mr-1">Salvar</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
@section('page-script')
<script>
    $(document).ready(function(){
        $('#formPacienteData').on('submit', function () {
            postData('formPacienteData', '{{ url("paciente/pacientes") }}');
            return false;
        });
    });
</script>
@endsection