@extends('web.backend.admin.layout.layout')

@section('content')

        <div class="row justify-content-center align-items-center">
            <div class="col-12 col-md-6 col-lg-6">
                <div class="card" style="box-shadow: 3px 3px 3px 3px rgba(0,0,0, 0.2)">
                    <div class="card-header">
                        <h4>Editar Propósito da Visita</h4>
                    </div>
                   
                    <div class="card-body">
                        @foreach ($purpose_of_visits as $purpose_of_visit)

                        <form method="post" action="{{route('purposeofvisit.update',$purpose_of_visit->uuid)}}">
                            @csrf
                            @method('PUT')
                            <div class="form-group">
                              <input type="text" class="form-control" name="uuid" id="uuid" readonly="" value="{{$purpose_of_visit->uuid}}">
                            </div>
                            <div class="form-group">
                              <input type="text" class="form-control" name="name" id="name" placeholder="provincia" value="{{$purpose_of_visit->name}}">
                            </div>

                            <div class="card-footer text-right mr-12">
                                <button class="btn btn-info mr-1" type="submit">Actualizar</button>
                                <a href="{{route('purposeofvisits.index')}}" class="btn btn-danger" type="reset">Cancelar</a>
                            </div>
                        </form>  
        
                        @endforeach

                    </div>
                </div>
    
            </div>
        </div>
  
@endsection
