@extends('layouts/contentLayoutMaster')

@section('title', 'Manipulados')

@section('content')
<div class="row">
    <div class="col-lg-12 col-12">
        <div class="card">
            <div class="card-header">
                <h3>
                    Prescrição de fórmulas e manipulados
                </h3>
            </div>
            <div class="card-body">
                <form id="formManipuladosData" action="{{ url('data/tudonutri/manipulados/save') }}" class="form">
                    <input type="hidden" name="id" id="id" value="{{ $manipulados->id ?? '0' }}" />
                    <div class="row">
                        <div class="col-12">
                            <div class="form-group">
                                <label class="form-label" for="nome">Nome</label>
                                <input type="text" name="nome_formula" class="form-control" id="nome_formula"
                                     value="{{ $manipulados->nome_formula ?? '' }}" />
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="form-group">
                                <label class="form-label" for="nome">Fórmula</label>
                                <textarea class="form-control" name="formula" rows="5"
                                    placeholder="">{{ $manipulados->formula ?? '' }}</textarea>
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
        $('#formManipuladosData').on('submit', function () {
            postData('formManipuladosData', '{{ url("tudonutri/manipulados") }}');
            return false;
        });
    });
</script>
@endsection