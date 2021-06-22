@extends('layouts/contentLayoutMaster')

@section('title', 'Dobras e Medidas')

@section('content')
<form id="formAntropometriaData" action="{{ url('data/tudonutri/antropometria/save') }}" class="form">
    <input type="hidden" name="id" id="id" value="{{ $antropometria->id ?? '0' }}" />
    <div class="row">
        <div class="col-lg-12 col-12">
            <div class="card">
                <div class="card-header">
                    <h3>Dados antropométricos básicos</h3>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6 col-12">
                            <div class="form-group">
                            <label class="form-label" for="nome">PESO ATUAL (KG)</label>
                             <input type="text" name="peso_atual" class="form-control" id="peso_atual"
                             value="{{ $antropometria->peso_atual ?? '' }}" />
                            </div>
                        </div>
                        <div class="col-md-6 col-12">
                            <div class="form-group">
                            <label class="form-label" for="nome">ESTATURA (CM)</label>
                                <input type="text" name="estatura" class="form-control" id="estatura"
                                 value="{{ $antropometria->estatura ?? '' }}" />
                            </div>
                        </div>
                        <div class="col-md-6 col-12">
                            <div class="form-group">
                            <label class="form-label" for="nome">ESTATURA SENTADO (CM)</label>
                                <input type="text" name="estatura_sentado" class="form-control" id="estatura_sentado"
                                  value="{{ $antropometria->estatura_sentado ?? '' }}" />
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
                    <h3>Dobras cutâneas</h3>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-3 col-6">
                            <div class="form-group">
                                <label class="form-label" for="nome">DOBRA TRICIPITAL (MM)</label>
                                <input type="text" name="dobra_tricipital" class="form-control" id="dobra_tricipital"
                                 value="{{ $antropometria->dobra_tricipital ?? '' }}" />
                            </div>
                        </div>
                        <div class="col-md-3 col-6">
                            <div class="form-group">
                            <label class="form-label" for="nome">DOBRA BICIPITAL (MM)</label>
                                <input type="text" name="dobra_bicipital" class="form-control"  
								 id="dobra_bicipital" value="{{ $antropometria->dobra_bicipital ?? ''}}" />
                            </div>
                        </div>
                        <div class="col-md-3 col-6">
                            <div class="form-group">
                            <label class="form-label" for="nome">DOBRA ABDOMINAL (MM)</label>
                                <input type="text" name="dobra_abdominal" class="form-control" id="dobra_abdominal"
                                 value="{{ $antropometria->dobra_abdominal ?? '' }}" />
                            </div>
                        </div>
                        <div class="col-md-3 col-6">
                            <div class="form-group">
                            <label class="form-label" for="nome">DOBRA SUBESCAPULAR (MM)</label>
                                <input type="text" name="dobra_subescapular" class="form-control" id="dobra_subescapular"
                                value="{{ $antropometria->dobra_subescapular ?? '' }}" />
                            </div>
                        </div>
                        <div class="col-md-3 col-6">
                            <div class="form-group">
                            <label class="form-label" for="nome">DOBRA AXILAR MÉDIA (MM)</label>
                                <input type="text" name="dobra_auxiliar_media" class="form-control" id="dobra_auxiliar_media"
                                value="{{ $antropometria->dobra_auxiliar_media ?? '' }}" />
                            </div>
                        </div> 
                        <div class="col-md-3 col-6">
                            <div class="form-group">
                            <label class="form-label" for="nome">DOBRA DA COXA (MM)</label>
                                <input type="text" name="dobra_coxa" class="form-control" id="dobra_coxa"
                                value="{{ $antropometria->dobra_coxa ?? '' }}" />
                            </div>
                        </div> 
                        <div class="col-md-3 col-6">
                            <div class="form-group">
                            <label class="form-label" for="nome">DOBRA TORÁCICA (MM)</label>
                                <input type="text" name="dobra_toracica" class="form-control" id="dobra_toracica"
                                value="{{ $antropometria->dobra_toracica ?? '' }}" />
                            </div>
                        </div>   
                        <div class="col-md-3 col-6">
                            <div class="form-group">
                            <label class="form-label" for="nome">DOBRA SUPRAILÍACA (MM)</label>
                                <input type="text" name="dobra_suprailiaca" class="form-control" id="dobra_suprailiaca"
                                value="{{ $antropometria->dobra_suprailiaca ?? '' }}" />
                            </div>
                        </div>    
                        <div class="col-md-3 col-6">
                            <div class="form-group">
                            <label class="form-label" for="nome">DOBRA DA PANTURRILHA (MM)</label>
                                <input type="text" name="dobra_panturilha" class="form-control" id="dobra_panturilha"
                                value="{{ $antropometria->dobra_panturilha ?? '' }}" />
                            </div>
                        </div>     
                        <div class="col-md-3 col-6">
                            <div class="form-group">
                            <label class="form-label" for="nome">DOBRA DA SUPRAESPINHAL (MM)</label>
                                <input type="text" name="dobra_supraespinhal" class="form-control" id="dobra_supraespinhal"
                                value="{{ $antropometria->dobra_supraespinhal ?? '' }}" />
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
                    <h3>Circunferências corporais</h3>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-3 col-6">
                            <div class="form-group">
                                <label class="form-label" for="nome">CIRCUNFERÊNCIA TÓRAX (CM)</label>
                                <input type="text" name="circunferencia_torax" class="form-control" id="circunferencia_torax"
                                 value="{{ $antropometria->circunferencia_torax ?? '' }}" />
                            </div>
                        </div>         
                        <div class="col-md-3 col-6">
                            <div class="form-group">
                            <label class="form-label" for="nome">CIRCUNFERÊNCIA OMBRO (CM)</label>
                                <input type="text" name="circunferencia_ombro" class="form-control"  
								 id="circunferencia_ombro" value="{{ $antropometria->circunferencia_ombro ?? ''}}" />
                            </div>
                        </div> 
                        <div class="col-md-3 col-6">
                            <div class="form-group">
                            <label class="form-label" for="nome">CIRCUNFERÊNCIA CINTURA (CM)</label>
                                <input type="text" name="circunferencia_cintura" class="form-control" id="circunferencia_cintura"
                                 value="{{ $antropometria->circunferencia_cintura ?? '' }}" />
                            </div>
                        </div> 
                        <div class="col-md-3 col-6">
                            <div class="form-group">
                            <label class="form-label" for="nome">CIRCUNFERÊNCIA QUADRIL (CM)</label>
                                <input type="text" name="circunferencia_quadril" class="form-control" id="circunferencia_quadril"
                                 value="{{ $antropometria->circunferencia_quadril ?? '' }}" />
                        </div>
                     </div> 
                        <div class="col-md-3 col-6">
                            <div class="form-group">
                            <label class="form-label" for="nome">CIRCUNFERÊNCIA ABDOMEN (CM)</label>
                                <input type="text" name="circunferencia_abdomen" class="form-control" id="circunferencia_abdomen"
                                 value="{{ $antropometria->circunferencia_abdomen ?? '' }}" />
                            </div>
                        </div> 
                        <div class="col-md-3 col-6">
                            <div class="form-group">
                            <label class="form-label" for="nome">CIRCUNFERÊNCIA BRAÇO RELAXADO (CM)</label>
                                <input type="text" name="circunferencia_braco_relaxado" class="form-control" id="circunferencia_braco_relaxado"
                                value="{{ $antropometria->circunferencia_braco_relaxado ?? '' }}" />
                            </div>
                        </div> 
                        <div class="col-md-3 col-6">
                            <div class="form-group">
                            <label class="form-label" for="nome">CIRCUNFERÊNCIA BRAÇO CONTRAÍDO (CM)</label>
                                <input type="text" name="circunferencia_braco_contraido" class="form-control" id="circunferencia_braco_contraido"
                                value="{{ $antropometria->circunferencia_braco_contraido ?? '' }}" />
                            </div>
                        </div>       
                        <div class="col-md-3 col-6">
                            <div class="form-group">
                            <label class="form-label" for="nome">CIRCUNFERÊNCIA DO ANTEBRAÇO (CM)</label>
                                <input type="text" name="circunferencia_antebraco" class="form-control" id="circunferencia_antebraco"
                                value="{{ $antropometria->circunferencia_antebraco ?? '' }}" />
                            </div>
                        </div>    
                        <div class="col-md-3 col-6">
                            <div class="form-group">
                            <label class="form-label" for="nome">CIRCUNFERÊNCIA DA COXA PROXIMAL (CM))</label>
                                <input type="text" name="circunferencia_coxa_proximal" class="form-control" id="circunferencia_coxa_proximal"
                                value="{{ $antropometria->circunferencia_coxa_proximal ?? '' }}" />
                            </div>
                        </div>     
                        <div class="col-md-3 col-6">
                            <div class="form-group">
                            <label class="form-label" for="nome">CIRCUNFERÊNCIA DA COXA MEDIAL (CM)</label>
                                <input type="text" name="circunferencia_coxa_medial" class="form-control" id="circunferencia_coxa_medial"
                                value="{{ $antropometria->circunferencia_coxa_medial ?? '' }}" />
                            </div>
                        </div>      
                        <div class="col-md-3 col-6">
                            <div class="form-group">
                            <label class="form-label" for="nome">CIRCUNFERÊNCIA COXA DISTAL (CM)</label>
                                <input type="text" name="circunferencia_coxa_distal" class="form-control" id="circunferencia_coxa_distal"
                                value="{{ $antropometria->circunferencia_coxa_distal ?? '' }}" />
                            </div>
                        </div>      
                        <div class="col-md-3 col-6">
                            <div class="form-group">
                            <label class="form-label" for="nome">CIRCUNFERÊNCIA DA PANTURRILHA (CM)</label>
                                <input type="text" name="circunferencia_panturilha" class="form-control" id="circunferencia_panturilha"
                                value="{{ $antropometria->circunferencia_panturilha ?? '' }}" />
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
                    <h3>Diâmetro ósseo</h3>
                </div>
                <div class="card-body">
                        <div class="col-md-3 col-6">
                            <div class="form-group">
                            <label class="form-label" for="nome">DIÂMETRO DO ÚMERO (CM)</label>
                                <input type="text" name="diametro_umero" class="form-control" id="diametro_umero"
                                 value="{{ $antropometria->diametro_umero ?? '' }}" />
                            </div>
                        </div>
                        <div class="col-md-3 col-6">
                            <div class="form-group">
                            <label class="form-label" for="nome">DIÂMETRO DO PUNHO (CM)</label>
                                <input type="text" name="diametro_punho" class="form-control" id="diametro_punho"
                                value="{{ $antropometria->diametro_punho ?? '' }}" />
                            </div>
                        </div>
                        <div class="col-md-3 col-6">
                            <div class="form-group">
                            <label class="form-label" for="nome">DIÂMETRO DO FÊMUR (CM)</label>
                                <input type="text" name="diametro_femur" class="form-control" id="diametro_femur"
                                value="{{ $antropometria->diametro_femur  ?? '' }}" />
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
        $('#formAntropometriaData').on('submit', function () {
            postData('formAntropometriaData', '{{ url("tudonutri/antropometria") }}');
            return false;
        });
    });
</script>
@endsection