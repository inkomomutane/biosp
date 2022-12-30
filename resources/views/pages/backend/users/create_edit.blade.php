@extends('layouts.backend.app')
@section('dashboard_title', request()->routeIs('user.edit') ? __('Update user') ." " . $user->name : __('Create user'))
@section('title', request()->routeIs('user.edit') ? __('Update user'). ' ' . $user->name : __('Create user'))
@section('content')
    <div class="row justify-content-center pt-2">
        <div class="row">
            <!--begin::Col-->
            <form
                action="@if (request()->routeIs('user.edit')) {{ route('user.update', $user->uuid) }} @else {{ route('user.store') }} @endif"
                method="post">
                @csrf

                @if (request()->routeIs('user.edit'))
                    @method('PATCH')
                @endif

                <div class="row">
                    <div class="card mb-5 mb-xl-7">
                        <!--begin::Header-->
                        <div class="card-header border-0 pt-3">
                            <h3 class="card-title align-items-start flex-column">
                                <span class="card-label fw-bold fs-3 mb-1">{{ __('Create user') }}</span>
                                <span class="text-muted mt-1 fw-semibold fs-7"></span>
                            </h3>
                            <div class="card-toolbar">
                                <button type="submit" class="btn btn-sm btn-light-success" name="store user">
                                    <!--begin::Svg Icon | path: icons/duotune/arrows/arr075.svg-->
                                    <span class="svg-icon svg-icon-2">
                                        @svg('fluentui-person-add-24')
                                    </span>
                                    <!--end::Svg Icon-->
                                    @if (request()->routeIs('user.edit'))
                                        {{ __('Update user') }}
                                    @else
                                        {{ __('Store user') }}
                                    @endif
                                </button>
                            </div>
                        </div>
                        <!--end::Header-->
                        <!--begin::Body-->
                        <div class="card-body py-3">
                            <!--begin::Table container-->
                            <div class="">
                                <!--begin::Form-->
                                <!--begin::Input group-->
                                <div class="row mb-5">
                                    <!--begin::Col-->
                                    <div class="col-md-6 fv-row">
                                        <!--begin::Label-->
                                        <label class="required fs-5 fw-bold mb-2">{{ __('Full name') }}</label>
                                        <!--end::Label-->
                                        <!--begin::Input-->
                                        <input type="text" class="form-control form-control-solid"
                                            placeholder="{{ __('Full name') }}" name="name" required
                                            value="@if (old('name')) {{ old('name') }}@elseif(request()->routeIs('user.edit'))
                                            {{ $user->name }} @endif" />
                                        <!--end::Input-->
                                        @error('name')
                                            <!--begin::Error full name -->
                                            <span
                                                class="fv-plugins-message-container fw-bolder invalid-feedback">{{ $message }}</span>
                                            <!--end::Error full name-->
                                        @enderror

                                    </div>
                                    <!--end::Col-->
                                    <!--begin::Col-->
                                    <div class="col-md-6 fv-row">
                                        <!--begin::Label-->
                                        <label class="required fs-5 fw-bold mb-2">{{ __('Email Address') }}</label>
                                        <!--end::Label-->
                                        <!--begin::Input-->
                                        <input type="text" class="form-control form-control-solid"
                                            placeholder="{{ __('Email Address') }}" name="email" required
                                            value="@if (old('email')) {{ old('email') }}@elseif(request()->routeIs('user.edit'))
                                            {{ $user->email }} @endif" />
                                        <!--end::Input-->
                                        @error('email')
                                            <!--begin::Error Email -->
                                            <span
                                                class="fv-plugins-message-container fw-bolder invalid-feedback">{{ $message }}</span>
                                            <!--end::Error Email-->
                                        @enderror

                                    </div>
                                    <!--end::Col-->
                                </div>
                                <!--end::Input group-->

                                @if (!request()->routeIs('user.edit'))
                                <!--begin::Input group-->
                                <div class="row mb-5">
                                    <!--begin::Col-->
                                    <div class="col-md-6 fv-row">
                                        <!--begin::Label-->
                                        <label class="required fs-5 fw-bold mb-2">{{ __('Password') }}</label>
                                        <!--end::Label-->
                                        <!--begin::Input-->
                                        <input type="password" class="form-control form-control-solid"
                                            placeholder="{{ __('Password') }}" name="password" required
                                            value="@if (old('password')) {{ old('password') }} @endif" />
                                        <!--end::Input-->
                                        @error('password')
                                            <!--begin::Error full name -->
                                            <span
                                                class="fv-plugins-message-container fw-bolder invalid-feedback">{{ $message }}</span>
                                            <!--end::Error full name-->
                                        @enderror
                                    </div>
                                    <!--end::Col-->

                                    <!--begin::Col-->
                                    <div class="col-md-6 fv-row">
                                        <!--begin::Label-->
                                        <label class="required fs-5 fw-bold mb-2">{{ __('Confirm Password') }}</label>
                                        <!--end::Label-->
                                        <!--begin::Input-->
                                        <input type="password" class="form-control form-control-solid"
                                            placeholder="{{ __('Confirm Password') }}" name="password_confirmation" required" />
                                        <!--end::Input-->
                                        @error('password_confirmation')
                                            <!--begin::Error full name -->
                                            <span
                                                class="fv-plugins-message-container fw-bolder invalid-feedback">{{ $message }}</span>
                                            <!--end::Error full name-->
                                        @enderror
                                    </div>
                                    <!--end::Col-->
                                </div>
                                <!--end::Input group-->
                                @endif
                                <!--end::Form-->
                            </div>
                            <!--end::Table container-->
                        </div>
                        <!--begin::Body-->
                    </div>
                </div>
            </form>
            <!--end::Col-->
        </div>
    </div>
@endsection


