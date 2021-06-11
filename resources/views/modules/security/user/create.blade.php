@extends('layouts/contentLayoutMaster')

@section('title', 'Usuários')

@section('content')
<div class="row">
    <div class="col-lg-12 col-12">
        <div class="card">
            <div class="card-header">
                <h3>Cadastro de Usuários</h3>
            </div>
            <div class="card-body">
                <form id="formUserData" action="{{ url('data/security/role/save') }}" class="form">
                    <input type="hidden" name="id" id="id" value="{{ $role->id ?? '0' }}" />
                    <div class="row">                        
                        <div class="col-md-6 col-12">
                            <div class="form-group">
                                <label class="form-label" for="nome">Nome</label>
                                <input type="text" name="nome" class="form-control" id="nome" 
                                placeholder="Digite o Nome" />
                            </div>
                        </div>
                        <div class="col-md-6 col-12">
                            <div class="form-group">
                                <label class="form-label" for="nome">Função</label>
                                <input type="text" name="funcao" class="form-control" id="funcao" 
                                placeholder="Digite a Função" />
                            </div>
                        </div>
                        <div class="col-md-6 col-12">
                            <div class="form-group">
                                <label class="form-label" for="nome">Nível de Acesso</label>
                                <select name="select" class="form-control">
                                    <option value="valor1" selected>Selecione:</option>
                                    <option value="valor2">Administrador</option>
                                    <option value="valor3">Financeiro</option>
                                    <option value="valor4">Produção</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6 col-12">
                            <div class="form-group">
                                <label class="form-label" for="nome">Página Inicial</label>
                                <input type="text" name="pagina_inicial" class="form-control" id="pagina_inicial" 
                                placeholder="Digite a Página Inicial" />
                            </div>
                        </div>
                        <div class="col-md-6 col-12">
                            <div class="form-group">
                                <label class="form-label" for="nome">E-mail</label>
                                <input type="text" name="email" class="form-control" id="email" 
                                placeholder="Digite o E-mail" />
                                <small class="form-text text-muted">Será utilizado para acesso ao Sistema</small>
                            </div>
                        </div>
                        <div class="col-md-6 col-12">
                            <div class="form-group">
                                <label class="form-label" for="nome">Senha</label>
                                <input type="password" name="senha" class="form-control" id="senha" 
                                placeholder="Digite a Senha" />
                                <small class="form-text text-muted">Será utilizado para acesso ao Sistema</small>
                            </div>
                        </div> 
                        <div class="col-md-6 col-12">
                            <div class="form-group">
                                <label class="form-label" for="nome">Telefone</label>
                                <input type="text" name="cnpj" class="form-control" id="cnpj" 
                                placeholder="Digite o Telefone" />
                            </div>
                        </div>
                        <div class="col-md-6 col-12">
                            <div class="form-group">
                                <label class="form-label" for="nome">Celular</label>
                                <input type="text" name="premio" class="form-control" id="premio" 
                                placeholder="Digite o Celular" />
                            </div>
                        </div>      
                    </div>       
                    <div class="row">
                        <div class="col-md-6 col-12">
                            <div class="form-group">
                                <label class="form-label">Status</label>
                                <div class="custom-control-primary custom-switch">
                                    <input type="checkbox" name="ativo" class="custom-control-input" id="ativo" value="1">
                                    <label class="custom-control-label" for="ativo">
                                        <span class="switch-icon-left">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-check"><polyline points="20 6 9 17 4 12"></polyline></svg>
                                        </span>
                                        <span class="switch-icon-right">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-x"><line x1="18" y1="6" x2="6" y2="18"></line><line x1="6" y1="6" x2="18" y2="18"></line></svg>
                                        </span>
                                    </label>
                                </div>
                            </div>
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
        $('#formUserData').on('submit', function () {
            postData('formUserData', '{{ url("security/user") }}');
            return false;
        });
    });
</script>
@endsection