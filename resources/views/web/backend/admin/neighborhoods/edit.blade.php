@extends('web.backend.admin.layout.layout')

@section('content')

    
 
        <div class="row justify-content-center align-items-center">
            <div class="col-12 col-md-6 col-lg-6">
                <div class="card" style="box-shadow: 3px 3px 3px 3px rgba(0,0,0, 0.2)">
                    <div class="card-header">
                        <h4>Editi Bairro</h4>
                    </div>
                    <div class="card-body">
                        @foreach ($neighborhoods as $neighborhood)
                        <form method="put" action="{{route('neighborhood.update',$neighborhood->uuid)}}">
                            @csrf
                            @method('put')
                        
                        <div class="form-group">
                            <input type="text" class="form-control" readonly="" value="{{$neighborhood->uuid}}">
                        </div>

                             <div class="form-group">
                                <select class="form-control" id="province_uuid" name="province_uuid" placeholder="provinces">
                               @foreach ($provinces as $province)
                                    <option id="{{$province->uuid}}">{{$province->name}}</option>
                                 @endforeach 
                            </select>
                        
                            </div>

                             <div class="form-group">
                                <input type="text" class="form-control" name="name" id="name" placeholder="bairro" value="{{$neighborhood->name}}">
                            </div>
                       
                        </div>
                        
                        <div class="card-footer text-right mr-12">
                            <button class="btn btn-primary mr-1" type="submit">Atualizar</button>
                            <button class="btn btn-danger" type="reset">Cancelar</button>
                        </div>
                        @endforeach
                    </form>  
                    </div>
                </div>
    
            </div>
        </div>
    
@endsection
