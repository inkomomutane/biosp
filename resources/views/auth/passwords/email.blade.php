@extends('layouts.backend.app_login')
@section('title',__('Send Password Reset Link'))
@section('content')
    @if (session('status'))
        <div class="alert alert-success" role="alert">
            {{ session('status') }}
        </div>
    @endif
    <form method="POST" action="{{ route('password.email') }}">
        @csrf

        <div class="row mb-3">
            <label for="email" class="form-label fs-6 fw-bolder text-dark text-md-start">{{ __('Email Address') }}</label>

            <div class="col-md-12">
                <input placeholder="{{ __('Email Address') }}" id="email" type="email"
                    class="form-control form-control-lg form-control-solid">
                @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                @endif
                @error('email')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
        </div>

        <div class="text-center w-100">
            <button type="submit" class="btn btn-primary w-100">
                {{ __('Send Password Reset Link') }}
            </button>
        </div>
    </form>
@endsection
