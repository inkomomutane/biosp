@extends('web.backend.admin.layout.layout')

@section('content')
<div class="container mt-5">
    <div class="row">
        <div class="col-12 col-sm-10 offset-sm-1 col-md-8 offset-md-2 col-lg-8 offset-lg-2 col-xl-8 offset-xl-2">
            <div class="card card-primary">
                <div class="card-header">
                    <h4> {{ __('Editar Usuários') }}</h4>
                </div>
                <div class="card-body">

                    @foreach ($users as $user)
                        
                    
                    <form method="POST" action="{{ route('user.update',$user->uuid) }}">
                        @csrf
                        @method('PUT')
                        <div class="row">
                            <div class="form-group col-12">
                                <label for="name">{{ __('Name') }}</label>
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ $user->name}}" name="frist_name" autofocus>
                                @error('name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                               @enderror
                            </div>
                          
                        </div>
                        <div class="form-group">
                            <label for="email">{{ __('E-Mail Address') }}</label>
                            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror"  value="{{$user->email}}" name="email">
                            <div class="invalid-feedback">
                            </div>
                            @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <div class="row">
                            <div class="form-group col-6">
                                <label for="password" class="d-block">{{ __('Password') }}</label>
                                <input id="password" type="password" class="form-control pwstrength @error('password') is-invalid @enderror" name="password"  data-indicator="pwindicator" name="password"  value="{{$user->password}}">
                                <div id="pwindicator" class="pwindicator">
                                    <div class="bar"></div>
                                    <div class="label"></div>
                                </div>
                            @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            
                            @enderror
                            </div>
                            <div class="form-group col-6">
                                <label for="password-confirm" class="d-block">{{ __('Confirm Password') }}</label>
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" value="{{$user->password}}">

                            </div>
                        </div>
                       
                       
                       
                        <div class="form-group">
                            <button type="submit" class="btn btn-primary btn-lg btn-block"> {{ __('Actulizar') }}</button>
                        </div>
                    </form>

                    @endforeach
                </div>
            </div>
            
        </div>
    </div>
</div>
@endsection
