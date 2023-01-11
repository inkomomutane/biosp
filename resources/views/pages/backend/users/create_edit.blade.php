@extends('layouts.backend.app')
@section('dashboard_title', request()->routeIs('user.edit') ?
 __(key:'Update :resource',replace:[ 'resource' => Str::lower(__('User'))])
. ' ' . $user->name :
__(key:'Create :resource',replace:[ 'resource' => Str::lower(__('User'))]))
@section('title', request()->routeIs('user.edit') ? __(key:'Update :resource',replace:[ 'resource' => Str::lower(__('User'))]) . ' ' . $user->name : __(key:'Create :resource',replace:[ 'resource' => Str::lower(__('User'))]))
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
                                <span class="card-label fw-bold fs-3 mb-1">
                                    @if (request()->routeIs('user.edit'))
                                        {{ __(key:'Update :resource',replace:[ 'resource' => Str::lower(__('User'))]) }}
                                    @else
                                        {{ __(key:'Create :resource',replace:[ 'resource' => Str::lower(__('User'))]) }}
                                    @endif

                                </span>
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
                                     {{ __(key:'Update :resource',replace:[ 'resource' => Str::lower(__('User'))]) }}
                                    @else
                                        {{ __(key:'Store :resource',replace:[ 'resource' => Str::lower(__('User'))]) }}
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
                                    <x-forms.input
                                        type="text" name="name" label="Full name" placeholder="Full name"
                                        :required="true"
                                        :value="old('name')?:(request()->routeIs('user.edit') ?$user->name : '' )"/>
                                    <x-forms.input
                                        type="email" name="email" label="Email Address" placeholder="Email Address"
                                        :required="true"
                                        :value="old('email')?:(request()->routeIs('user.edit') ?$user->email : '' )"/>
                                </div>
                                <!--end::Input group-->


                                @if (!request()->routeIs('user.edit'))
                                    <!--begin::Input group-->
                                    <div class="row mb-5">
                                        <x-forms.input
                                            type="password" name="password" label="Password" placeholder="Password"
                                            :required="true"
                                            :value="old('password')??''">
                                        </x-forms.input>

                                        <x-forms.input
                                            type="password" name="password_confirmation" label="Confirm Password" placeholder="Confirm Password"
                                            :required="true"
                                            :value="old('password_confirmation')??''"/>
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
