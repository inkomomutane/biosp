@extends('web.backend.admin.layout.layout')

@section('content')

        <div class="row justify-content-center align-items-center">
            <div class="col-12 col-md-6 col-lg-6">
                <div class="card" style="box-shadow: 3px 3px 3px 3px rgba(0,0,0, 0.2)">
                    <div class="card-header">
                        <h4>Editar Objectvo de Abertura de Processoa</h4>
                    </div>
                   
                    <div class="card-body">
                        @foreach ($reason_opening_cases as$reason_opening_case)

                        <form method="post" action="{{route('reasonopeningcase.update',$reason_opening_case->uuid)}}">
                            @csrf
                            @method('PUT')
                            <div class="form-group">
                              <input type="text" class="form-control" name="uuid" id="uuid" readonly="" value="{{$reason_opening_case->uuid}}">
                            </div>
                            <div class="form-group">
                              <input type="text" class="form-control" name="name" id="name"  value="{{$reason_opening_case->name}}">
                            </div>

                            <div class="card-footer text-right mr-12">
                                <button class="btn btn-info mr-1" type="submit">Actualizar</button>
                                <a href="{{route('reasonopeningcases.index')}}" class="btn btn-danger" type="reset">Cancelar</a>
                            </div>
                        </form>  
        
                        @endforeach

                    </div>
                </div>
    
            </div>
        </div>
  
@endsection
