@extends('web.backend.admin.layout.layout')

@section('content')
<div class="row justify-content-center align-items-center">
    <div class="col-12 col-md-6 col-lg-6">
        <div class="card "  style="box-shadow: 3px 3px 3px 3px rgba(0,0,0, 0.2)">
            <div class="card-header">
                <h4>Card Title</h4>
            </div>
            <div class="card-body">
               @foreach ($neighborhood as $item)
                   {{$item->uuid}}
                   {{$item->name}}
                  
               @endforeach
            </div>
            <div class="card-footer">
                <div class="card-footer text-right">
                    <a href="{{route('neighborhoods.index')}}" class="btn btn-danger" type="reset">Voltar</a>
                </div>
            </div>
        </div>
        
    </div>
    

</div>



@endsection











