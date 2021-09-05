@extends('web.backend.admin.layout.layout')

@push('ccs')
 
<!-- CSS Libraries -->
<link rel="stylesheet" href="assets/modules/bootstrap-daterangepicker/daterangepicker.css">
<link rel="stylesheet" href="assets/modules/bootstrap-colorpicker/dist/css/bootstrap-colorpicker.min.css">
<link rel="stylesheet" href="assets/modules/select2/dist/css/select2.min.css">
<link rel="stylesheet" href="assets/modules/jquery-selectric/selectric.css">
<link rel="stylesheet" href="assets/modules/bootstrap-timepicker/css/bootstrap-timepicker.min.css">
<link rel="stylesheet" href="assets/modules/bootstrap-tagsinput/dist/bootstrap-tagsinput.css">

@endpush

@section('content')

    <form method="post" action="{{route('benificiaries.store')}}">
        @csrf
        <div class="row justify-content-center align-items-center">
            <div class="col-12 col-md-6 col-lg-6">
                <div class="card" style="box-shadow: 3px 3px 3px 3px rgba(0,0,0, 0.2)">
                    <div class="card-header">
                        <h4>Adicionar Beneficiário</h4>
                    </div>
                    <div class="card-body">
                        <div class="form-group">
                            <input type="text" class="form-control" name="full_name"  id="full_name" placeholder="Nome Completo">
                        </div>

                        <div class="form-group">
                            <label>Selecione  gênero</label></label>
                            <select class="form-control">
                                <option>Option 1</option>
                                <option>Option 2</option>
                                <option>Option 3</option>
                            </select>
                        </div>


                        <div class="form-group">
                            <input type="text" class="form-control" name="number_of_visits"  id="number_of_visits" placeholder="Numero de Visita">
                        </div>

                        <div class="form-group">
                            <label>Selecione o Tipo de Documento</label></label>
                            <select class="form-control">
                                <option>Option 1</option>
                                <option>Option 2</option>
                                <option>Option 3</option>
                            </select>
                        </div>

                        <div class="form-group">
                            <label>Data de Nascimento</label>
                            <input type="text" class="form-control datepicker">
                        </div>

                        <div class="form-group">
                            <input type="text" class="form-control" name="phone"  id="phone" placeholder="Telefone">
                        </div>

                        <div class="form-group">
                            <label>Service Date</label>
                            <input type="text" class="form-control datetimepicker">
                        </div>

                        <div class="form-group">
                            <label>Selecione Bairro</label></label>
                            <select class="form-control">
                                <option>Option 1</option>
                                <option>Option 2</option>
                                <option>Option 3</option>
                            </select>
                        </div>

                        <div class="form-group">
                            <label class="d-block">Nescita de Acompanhamento Domicial?</label>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="exampleRadios" id="exampleRadios1" checked>
                                <label class="form-check-label" for="exampleRadios1">Sim</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="exampleRadios" id="exampleRadios2" checked>
                                <label class="form-check-label" for="exampleRadios2">Nao</label>
                            </div>
                        </div>

                        <div class="form-group">
                            <input type="text" class="form-control" name="purpose_of_visit"  id="purpose_of_visit" placeholder="Proposito da Visita">
                        </div>

                        <div class="form-group">
                            <label>date_received</label>
                            <input type="text" class="form-control datetimepicker">
                        </div>
        
                        <div class="card-footer text-right mr-12">
                            <button class="btn btn-primary mr-1" type="submit">Salvar</button>
                            <a href="#" class="btn btn-danger" type="reset">Cancelar</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>   
@endsection

@push('script')
  <!-- JS Libraies -->
<script src="assets/modules/cleave-js/dist/cleave.min.js"></script>
<script src="assets/modules/cleave-js/dist/addons/cleave-phone.us.js"></script>
<script src="assets/modules/jquery-pwstrength/jquery.pwstrength.min.js"></script>
<script src="assets/modules/bootstrap-daterangepicker/daterangepicker.js"></script>
<script src="assets/modules/bootstrap-colorpicker/dist/js/bootstrap-colorpicker.min.js"></script>
<script src="assets/modules/bootstrap-timepicker/js/bootstrap-timepicker.min.js"></script>
<script src="assets/modules/bootstrap-tagsinput/dist/bootstrap-tagsinput.min.js"></script>
<script src="assets/modules/select2/dist/js/select2.full.min.js"></script>
<script src="assets/modules/jquery-selectric/jquery.selectric.min.js"></script>
@endpush



