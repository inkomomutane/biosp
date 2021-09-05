@extends('web.backend.admin.layout.layout')

@section('content')

    <form method="post" action="{{route('province.store')}}">
        @csrf
        <div class="row justify-content-center align-items-center">
            <div class="col-12 col-md-6 col-lg-6">
                <div class="card" style="box-shadow: 3px 3px 3px 3px rgba(0,0,0, 0.2)">
                    <div class="card-header">
                        <h4>specify_the_propose</h4>
                    </div>
                    <div class="card-body">
                        <div class="form-group">
                            <input type="text" class="form-control" name="uuid"  id="uuid" placeholder="uuid">
                        </div>

                        <div class="form-group">
                            <input type="text" class="form-control" name="name" id="name" placeholder="especificar ">
                        </div>
        
                        <div class="card-footer text-right mr-12">
                            <button class="btn btn-primary mr-1" type="submit">Salvar</button>
                            <a href="{{route('provinces.index')}}" class="btn btn-danger" type="reset">Cancelar</a>
                        </div>
                    
                    </div>
                </div>
    
            </div>
        </div>
    </form>   
@endsection
