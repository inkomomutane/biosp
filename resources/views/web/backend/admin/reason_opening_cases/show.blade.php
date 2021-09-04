@extends('web.backend.admin.layout.layout')

@section('content')
<div class="row justify-content-center align-items-center">
    <div class="col-12 col-md-6 col-lg-6">
        <div class="card "  style="box-shadow: 3px 3px 3px 3px rgba(0,0,0, 0.2)">
            @foreach ($reason_opening_cases as $reason_opening_case)
            <div class="card-header">
                <h4>Detalhe: {{$reason_opening_case->name}}</h4>
            </div>
            <div class="card-body">
                   {{$reason_opening_case->uuid}}
                   {{$reason_opening_case->name}}
               @endforeach
            </div>
            <div class="card-footer">
                <div class="card-footer text-right">
                    <a href="{{route('reasonopeningcases.index')}}" class="btn btn-info" type="reset">Voltar</a>
                </div>
            </div>
        </div>
        
    </div>

</div>
@endsection



