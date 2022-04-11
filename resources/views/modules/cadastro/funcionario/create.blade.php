@extends('layouts/contentLayoutMaster')

@section('title', 'Funcionários')

@section('content')
<form id="formFuncionarioData" action="{{ url('data/cadastros/funcionarios/save') }}" class="form">
    <input type="hidden" name="id" id="id" value="{{ $funcionario->id ?? '0' }}" />
    <div class="row">
        <div class="col-lg-12 col-12">
            <div class="card">
                <div class="card-header">
                    <h3>Dados Gerais</h3>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6 col-12">
                            <div class="form-group">
                            <label class="form-label" for="nome">Nome</label>
                             <input type="text" name="nome" class="form-control" id="nome"
                              placeholder="Digite o nome completo" value="{{ $funcionario->nome ?? '' }}" />
                            </div>
                        </div>
                        
                        <div class="col-md-6 col-12">
                            <div class="form-group">
                                <label class="form-label" for="sexo">Sexo</label>
                                <select name="sexo" id="sexo" class="form-control" required >
                                    <option value=""></option>
                                    <option value="Masculino" {{ $funcionario->sexo == "Masculino" ? 'selected="selected"' : '' }}>Masculino</option>
                                    <option value="Feminino" {{ $funcionario->indice == "Feminino" ? 'selected="selected"' : '' }}>Feminino</option>
                                    <option value="Outro" {{ $funcionario->indice == "Outro" ? 'selected="selected"' : '' }}>Outro</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6 col-12">
                            <div class="form-group">
                            <label class="form-label" for="nome">CPF</label>
                                <input type="text" name="cpf" class="form-control" id="cpf"
                                    placeholder="Digite o cpf" value="{{ $funcionario->cpf ?? '' }}" />
                            </div>
                        </div>
                        <div class="col-md-6 col-12">
                            <div class="form-group">
                            <label class="form-label" for="nome">Data de nascimento</label>
                                <input type="date" name="data_nascimento" class="form-control" id="data_nascimento"
                                    placeholder="Digite a data de nascimento" value="{{ $funcionario->data_nascimento ?? '' }}" />
                            </div>
                        </div>
                        <div class="col-md-6 col-12">
                            <div class="form-group">
                            <label class="form-label" for="nome">Celular</label>
                                <input type="text" name="celular" class="form-control" placeholder="Digite o número de celular" 
								 id="celular" value="{{ $funcionario->celular ?? ''}}" />
                            </div>
                        </div>
                        <div class="col-md-6 col-12">
                            <div class="form-group">
                            <label class="form-label" for="nome">Telefone</label>
                            <input type="text" name="tel_residencial" class="form-control" id="tel_residencial"
                            placeholder="Digite o telefone residencial" value="{{ $funcionario->tel_residencial ?? '' }}" /> 
                            </div>
                        </div>
                        <div class="col-md-6 col-12">
                            <div class="form-group">
                            <label class="form-label" for="nome">Função</label>
                                <input type="text" name="funcao" class="form-control" id="funcao"
                                    placeholder="Defina a função do seu funcionário" value="{{ $funcionario->funcao ?? '' }}" />
                            </div>
                        </div>
                        <div class="col-md-6 col-12">
                            <div class="form-group">
                            <label class="form-label" for="nome">E-mail</label>
                            <input type="text" name="email" class="form-control" id="email"
                            placeholder="Digite o e-mail" value="{{ $funcionario->email ?? '' }}" /> 
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6 col-12">
                            <div class="form-group">
                                <label class="form-label">Status</label>
                                <div class="custom-control-primary custom-switch">
                                    <input type="checkbox" name="ativo" class="custom-control-input" id="ativo" value="1"
                                    {{ !isset($funcionario->ativo) || ( isset($funcionario->ativo) && $funcionario->ativo == 1 ) ? 'checked="checked"' : '' }}>
                                    <label class="custom-control-label" for="ativo">
                                        <span class="switch-icon-left">
                                            <i data-feather="check"></i>
                                        </span>
                                        <span class="switch-icon-right">
                                            <i data-feather="x"></i>
                                        </span>
                                    </label>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-12 col-12">
            <div class="card">
                <div class="card-header">
                    <h3>Endereço</h3>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-3 col-12">
                            <label class="form-label col-12" for="btnCep">&nbsp;</label>
                            <div class="input-group mb-2">
                                <input type="text" id="cep" name="cep" value="" class="form-control"
                                    placeholder="Digite o CEP..." aria-label="Digite o CEP"
                                    aria-describedby="btnCep">
                                <div class="input-group-append">
                                    <span class="input-group-text" id="btnCep" onclick="searchPostalCode();">
                                        <i data-feather="search"></i>
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6 col-12">
                            <div class="form-group">
                                <label class="form-label" for="nome">Endereço</label>
                                <input type="text" name="endereco" class="form-control" id="endereco"
                                    placeholder="Digite o endereco" value="{{ $funcionario->endereco ?? '' }}" />
                            </div>
                        </div>
                        <div class="col-md-3 col-6">
                            <div class="form-group">
                            <label class="form-label" for="nome">Número</label>
                                <input type="text" name="numero_casa" class="form-control" placeholder="Digite o número da casa" 
								 id="numero_casa" value="{{ $funcionario->numero_casa ?? ''}}" />
                            </div>
                        </div>
                        <div class="col-md-6 col-12">
                            <div class="form-group">
                            <label class="form-label" for="nome">Bairro</label>
                                <input type="text" name="bairro" class="form-control" id="bairro"
                                    placeholder="Digite o bairro" value="{{ $funcionario->bairro ?? '' }}" />
                            </div>
                        </div>
                        <div class="col-md-4 col-12">
                            <div class="form-group">
                            <label class="form-label" for="nome">Cidade</label>
                                <input type="text" name="cidade" class="form-control" id="cidade"
                                    placeholder="Digite a cidade" value="{{ $funcionario->cidade ?? '' }}" />
                            </div>
                        </div>
                        <div class="col-md-2 col-12">
                            <div class="form-group">
                                <label class="form-label" for="uf">UF</label>
                                <select name="uf" id="uf" class="form-control">
                                    <option value="{{ $funcionario->uf ?? ''}}"></option>
                                    <option {AC} value="AC">AC</option>
                                    <option {AL} value="AL">AL</option>
                                    <option {AP} value="AP">AP</option>
                                    <option {AM} value="AM">AM</option>
                                    <option {BA} value="BA">BA</option>
                                    <option {CE} value="CE">CE</option>
                                    <option {DF} value="DF">DF</option>
                                    <option {ES} value="ES">ES</option>
                                    <option {GO} value="GO">GO</option>
                                    <option {MA} value="MA">MA</option>
                                    <option {MT} value="MT">MT</option>
                                    <option {MS} value="MS">MS</option>
                                    <option {MG} value="MG">MG</option>
                                    <option {PA} value="PA">PA</option>
                                    <option {PB} value="PB">PB</option>
                                    <option {PR} value="PR">PR</option>
                                    <option {PE} value="PE">PE</option>
                                    <option {PI} value="PI">PI</option>
                                    <option {RJ} value="RJ">RJ</option>
                                    <option {RN} value="RN">RN</option>
                                    <option {RS} value="RS">RS</option>
                                    <option {RO} value="RO">RO</option>
                                    <option {RR} value="RR">RR</option>
                                    <option {SC} value="SC">SC</option>
                                    <option {SP} value="SP">SP</option>
                                    <option {SE} value="SE">SE</option>
                                    <option {TO} value="TO">TO</option>
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
  <div class="row">&nbsp;</div>
                    <div class="row">
                        <div class="col-md-6 col-12">
                            <button type="submit" class="btn btn-primary data-submit mr-1">
                                <i data-feather='save'></i>
                                Salvar
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>

@endsection
@section('page-script')
<script>
    $(document).ready(function(){
        $("#uf").select2();

        $('#formFuncionarioData').on('submit', function () {
            postData('formFuncionarioData', '{{ url("cadastros/funcionarios") }}');
            return false;
        });

        $('#sexo').select2({
            closeOnSelect: false
        });

        new Cleave('#cep', {
            numericOnly: true,
            blocks: [5, 3],
            delimiters: ["-"]
        });
    });

function searchPostalCode() {
    $.getJSON( 'https://api.postmon.com.br/v1/cep/' + $('#cep').val().replace('-','') ).done( function( data2 ) {
        if(!data2) {
            notify('error', 'CEP não encontrado!');
        } else {
            $('#endereco').val( data2.logradouro );
            $('#bairro').val( data2.bairro );
            $('#cidade').val( data2.cidade );
            $('#uf').val( data2.estado );
            $("#uf").select2();
        }
    });
}
</script>
@endsection