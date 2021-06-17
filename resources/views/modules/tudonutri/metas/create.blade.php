@extends('layouts/contentLayoutMaster')

@section('title', 'Metas')

@section('content')
<div class="row">
    <div class="col-lg-12 col-12">
        <div class="card">
            <div class="card-header">
                <h3>
                    Cadastro de Metas
                </h3>
          </div>
            <div class="card-body">
               <div class = "col-12">
              <b>Trabalhar com metas pode ser um importante aliado quando o objetivo é uma reeducação alimentar ou mudança de hábito.</b>
               </div>
               <br>
                <form id="formMetasData" action="{{ url('data/tudonutri/metas/save') }}" class="form">
                    <input type="hidden" name="id" id="id" value="{{ $metas->id ?? '0' }}" />
                    <div class="row">
                        <div class="col-12">
                            <div class="form-group">
                                <label class="form-label" for="nome">Nome</label>
                                <input type="text" name="nome_metas" class="form-control" id="nome_metas"
                                    placeholder="Nome da meta" value="{{ $metas->nome_metas ?? '' }}" />
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="form-group">
                                <label class="form-label" for="nome">Descrição</label>
                                <textarea class="form-control" name="descricao" rows="5"
                                    placeholder="Breve descrição/Orientação">{{ $metas->descricao ?? '' }}</textarea>
                            </div>
                        </div>     
                    </div>
                    <div class="row">
                        <div class="col-6">
                            <div class="form-group">
                                <label class="form-label" for="nome">Data de Ínicio</label>
                                <input type="date" name="data_inicio" class="form-control" id="data_inicio"
                                 value="{{ $metas->data_inicio ?? '' }}" />
                            </div>
                        </div>
                        <div class="col-6">
						<div class="form-group">
                                <label class="form-label" for="nome">Data de Termíno</label>
                                <input type="date" name="data_termino" class="form-control" id="data_termino"
                                value="{{ $metas->data_termino ?? '' }}" />
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-6">
                            <div class="form-group">
                                <label class="form-label" for="nome">Frequência desejada</label>
                                <input type="text" name="frequencia" class="form-control" id="frequencia"
                                 value="{{ $metas->frequencia ?? '' }}" />
                            </div>
                        </div>
                        <div class="col-6">
						<div class="form-group">
                                <label class="form-label" for="nome">Vez(es)por:</label>
                                <input type="text" name="vezes_por" class="form-control" id="vezes_por"
                                value="{{ $metas->vezes_por ?? '' }}" />
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
@endsection
@section('page-script')
<script>
    $(document).ready(function(){
        $('#formMetasData').on('submit', function () {
            postData('formMetasData', '{{ url("tudonutri/metas") }}');
            return false;
        });
    });
</script>
@endsection