@extends('layouts.backend.app_login')

@section('content')
    <form method="POST" action="{{ route('register') }}">
        @csrf

        <div class="row mb-3">
            <label for="name" class="form-label fs-6 fw-bolder text-dark text-md-start">{{ __('Name') }}</label>

            <div class="col-md-12">
                <input placeholder="{{ __('Name') }}" id="name" type="text"
                    class="form-control form-control-lg form-control-solid @error('name') is-invalid @enderror"
                    name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                @error('name')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
        </div>

        <div class="row mb-3">
            <label for="email"
                class="form-label fs-6 fw-bolder text-dark text-md-start">{{ __('Email Address') }}</label>

            <div class="col-md-12">
                <input placeholder="{{ __('Email Address') }}" id="email" type="email"
                    class="form-control form-control-lg form-control-solid @error('email') is-invalid @enderror"
                    name="email" value="{{ old('email') }}" required autocomplete="email">

                @error('email')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
        </div>

        <div class="row mb-3">
            <label for="password" class="form-label fs-6 fw-bolder text-dark text-md-start">{{ __('Password') }}</label>

            <div class="col-md-12">
                <input placeholder="{{ __('Password') }}" id="password" type="password"
                    class="form-control form-control-lg form-control-solid @error('password') is-invalid @enderror"
                    name="password" required autocomplete="new-password">

                @error('password')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
        </div>

        <div class="row mb-3">
            <label for="password-confirm"
                class="form-label fs-6 fw-bolder text-dark text-md-start">{{ __('Confirm Password') }}</label>

            <div class="col-md-12">
                <input placeholder="{{ __('Confirm Password') }}" id="password-confirm" type="password"
                    class="form-control form-control-lg form-control-solid" name="password_confirmation" required
                    autocomplete="new-password">
            </div>
        </div>

        <div class="text-center">
            <button type="submit" class="btn btn-icon-light btn-text-light btn-primary w-100 mb-5">
                <span class="svg-icon svg-icon-1">
                    @svg('fluentui-people-community-add-24')

                </span>
                <span class="indicator-label">{{ __('Register') }}</span>
            </button>
            <!--begin::Link-->
            <div class="text-gray-400 fw-bold fs-4">{{ __('Possui conta') }}?
                <a href="{{ route('login') }}" class="link-primary fw-bolder">{{ __('Login') }}</a>
            </div>
            <!--end::Link-->
        </div>
    </form>
@endsection
@section('title',__('Register'))
