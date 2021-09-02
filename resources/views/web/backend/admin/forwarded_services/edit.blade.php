@extends('web.backend.admin.layout.layout')

@section('content')

        <div class="row justify-content-center align-items-center">
            <div class="col-12 col-md-6 col-lg-6">
                <div class="card" style="box-shadow: 3px 3px 3px 3px rgba(0,0,0, 0.2)">
                    <div class="card-header">
                        <h4>Actulizar Proveniência</h4>
                    </div>
                   
                    <div class="card-body">
                        @foreach ($forwarded_services as $forwarded_service)

                        <form method="post" action="{{route('forwarded_service.update',$forwarded_service->uuid)}}">
                            @csrf
                            @method('PUT')
                            <div class="form-group">
                              <input type="text" class="form-control" name="uuid" id="uuid" readonly="" value="{{$forwarded_service->uuid}}">
                            </div>
                            <div class="form-group">
                              <input type="text" class="form-control" name="name" id="name" placeholder="provincia" value="{{$forwarded_service->name}}">
                            </div>

                            <div class="card-footer text-right mr-12">
                                <button class="btn btn-info mr-1" type="submit">Actualizar</button>
                                <a href="{{route('forwardedservices.index')}}" class="btn btn-danger" type="reset">Cancelar</a>
                            </div>
                        </form>  
                        @endforeach
                    </div>
                </div>
    
            </div>
        </div>
  
@endsection
