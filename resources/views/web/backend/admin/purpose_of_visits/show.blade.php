@extends('web.backend.admin.layout.layout')

@section('content')
<div class="row justify-content-center align-items-center">
    <div class="col-12 col-md-6 col-lg-6">
        <div class="card "  style="box-shadow: 3px 3px 3px 3px rgba(0,0,0, 0.2)">
            @foreach ($purpose_of_visits as $purpose_of_visit)
            <div class="card-header">
                <h4>Detalhe: {{$purpose_of_visit->name}}</h4>
            </div>
            <div class="card-body">
                   {{$purpose_of_visit->uuid}}
                   {{$purpose_of_visit->name}}
               @endforeach
            </div>
            <div class="card-footer">
                <div class="card-footer text-right">
                    <a href="{{route('purposeofvisits.index')}}" class="btn btn-info" type="reset">Voltar</a>
                </div>
            </div>
        </div>
        
    </div>

</div>
@endsection



