
@extends('web.backend.admin.layout.layout')

@section('content')
<div class="row justify-content-center align-items-center">
    <div class="col-12 col-md-6 col-lg-6">
        <div class="card "  style="box-shadow: 3px 3px 3px 3px rgba(0,0,0, 0.2)">
            @foreach ($genres as $genre)
            <div class="card-header">
                <h4>Detalhe: {{$genre->name}}</h4>
            </div>
            <div class="card-body">
                   {{$genre->uuid}}
                   {{$genre->name}}
               @endforeach
            </div>
            <div class="card-footer">
                <div class="card-footer text-right">
                    <a href="{{route('genres.index')}}" class="btn btn-info" type="reset">Voltar</a>
                </div>
            </div>
        </div>
        
    </div>
    

</div>

@endsection



