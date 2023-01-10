@extends('layouts.backend.app_login')

@section('title',__('Login'))
@section('content')
    <!--begin::Form-->
    <form class="form w-100" novalidate="novalidate" id="kt_sign_in_form" method="POST" action="{{ route('login') }}">
        @csrf
        <!--begin::Input group-->
        <div class="fv-row mb-10">
            <!--begin::Label-->
            <label class="form-label fs-6 fw-bolder text-dark">{{ __('Email Address') }}</label>
            <!--end::Label-->
            <!--begin::Input-->
            <input id="email" type="email"
                class="form-control form-control-lg form-control-solid @error('email') is-invalid @enderror" name="email"
                value="{{ old('email') }}" required autocomplete="email" autofocus
                placeholder="{{ __('Email Address') }}" />
            <!--end::Input-->
            <!--begin::error email-->
            @error('email')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
            <!--end::error email -->
        </div>
        <!--end::Input group-->
        <!--begin::Input group-->
        <div class="fv-row mb-10">
            <!--begin::Wrapper-->
            <div class="d-flex flex-stack mb-2">
                <!--begin::Label-->
                <label class="form-label fw-bolder text-dark fs-6 mb-0">{{ __('Password') }}</label>
                <!--end::Label-->
                <!--begin::Link-->

                @if (Route::has('password.request'))
                    <a class="link-primary fs-6 fw-bolder" href="{{ route('password.request') }}">
                        {{ __('Forgot Your Password?') }}
                    </a>
                @endif
                <!--end::Link-->
            </div>
            <!--end::Wrapper-->
            <!--begin::Input-->
            <input id="password" type="password"
                class="form-control form-control-lg form-control-solid @error('password') is-invalid @enderror"
                name="password" required autocomplete="current-password" placeholder="{{ __('Password') }}" />
            <!--end::Input-->

            <!--begin::error-password -->
            @error('password')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
            <!--end:: error password -->
        </div>
        <!--end::Input group-->
        <!--begin::Actions-->
        <div class="text-center">
            <!--begin::Submit button-->
            <button type="submit" id="kt_sign_in_submit" class="btn btn-icon-light btn-lg btn-primary w-100 mb-5">
                <span class="svg-icon svg-icon-1">
                    @svg('fluentui-people-lock-24-o')
                    </span>
                <span class="indicator-label">{{ __('Login') }}</span>
            </button>
            <!--end::Submit button-->
            {{-- <!--begin::Link-->
            <div class="text-gray-400 fw-bold fs-4">{{ __('Sem conta') }}?
                <a href="{{ route('register') }}" class="link-primary fw-bolder">{{ __('Register') }}</a>
            </div>
            <!--end::Link--> --}}
        </div>
        <!--end::Actions-->
    </form>
    <!--end::Form-->
@endsection
