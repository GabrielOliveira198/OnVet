@extends('layouts/contentLayoutMaster')

@section('title', 'Anamnese')

@section('content')
<div class="row">
    <div class="col-lg-12 col-12">
        <div class="card">
            <div class="card-header">
                <h3>
                    Cadastro de Anamnese
                </h3>
            </div>
            <div class="card-body">
                <form id="formAnamneseData" action="{{ url('data/tudonutri/anamnese/save') }}" class="form">
                    <input type="hidden" name="id" id="id" value="{{ $anamnese->id ?? '0' }}" />
                    <div class="row">
                        <div class="col-12">
                            <div class="form-group">
                                <label class="form-label" for="nome">Nome</label>
                                <input type="text" name="nome_anamnese" class="form-control" id="nome_anamnese"
                                    placeholder="Nome anamnese favorita" value="{{ $anamnese->nome_anamnese ?? '' }}" />
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="form-group">
                                <label class="form-label" for="nome">Conteúdo</label>
                                <textarea class="form-control" name="conteudo" rows="5"
                                    placeholder="Digite o conteúdo da anamnese">{{ $anamnese->conteudo ?? '' }}</textarea>
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
        $('#formAnamneseData').on('submit', function () {
            postData('formAnamneseData', '{{ url("tudonutri/anamnese") }}');
            return false;
        });
    });
</script>
@endsection