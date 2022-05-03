@extends('layouts/contentLayoutMaster')

@section('title', ' Cadastrar protocolo IATF')

@section('content')
<div class="row">
    <div class="col-lg-12 col-12">
        <div class="card">
            <div class="card-header">
                <h3>
                    Cadastrar protocolo IATF
                </h3>
            </div>
            <div class="card-body">
                <form id="formIatfData" action="{{ url('data/cadastros/iatfs/save') }}" class="form">
                    <input type="hidden" name="id" id="id" value="{{ $iatf->id ?? '0' }}" />
                    <div class="row">
                        <div class="col-12">
                            <div class="form-group">
                                <label class="form-label" for="nome">Nome</label>
                                <input type="text" name="nome" class="form-control" id="nome"
                                    placeholder="Digite o nome" value="{{ $iatf->nome ?? '' }}" required/>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="form-group">
                                <label class="form-label" for="desc">Descrição</label>
                                <input type="text" name="desc" class="form-control" id="desc"
                                    placeholder="Digite a descrição" value="{{ $iatf->desc ?? '' }}" required/>
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
        $('#formIatfData').on('submit', function () {
            postData('formIatfData', '{{ url("cadastros/iatfs") }}');
            return false;
        });
    });
</script>
@endsection