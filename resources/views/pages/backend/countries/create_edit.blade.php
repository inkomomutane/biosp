@extends('layouts.backend.app')
@section('dashboard_title', request()->routeIs('country.edit') ? __(key:'Update :resource',replace:[ 'resource' => Str::lower(__('Country'))]) . ' ' . $country->name : __(key:'Create :resource',replace:[ 'resource' => Str::lower(__('Country'))]))
@section('title', request()->routeIs('country.edit') ?  __(key:'Update :resource',replace:[ 'resource' => Str::lower(__('Country'))]) . ' ' . $country->name :  __(key:'Create :resource',replace:[ 'resource' => Str::lower(__('Country'))]))
@section('content')
    <div class="row justify-content-center pt-2">
        <div class="row">
            <!--begin::Col-->
            <form
                action="@if (request()->routeIs('country.edit')) {{ route('country.update', $country->ulid) }} @else {{ route('country.store') }} @endif"
                method="post">
                @csrf

                @if (request()->routeIs('country.edit'))
                    @method('PATCH')
                @endif

                <div class="row">
                    <div class="card mb-5 mb-xl-7">
                        <!--begin::Header-->
                        <div class="card-header border-0 pt-3">
                            <h3 class="card-title align-items-start flex-column">
                                <span class="card-label fw-bold fs-3 mb-1">
                                    @if (request()->routeIs('country.edit'))
                                        {{  __(key:'Update :resource',replace:[ 'resource' => Str::lower(__('Country'))]) }}
                                    @else
                                        {{  __(key:'Create :resource',replace:[ 'resource' => Str::lower(__('Country'))]) }}
                                    @endif

                                </span>
                                <span class="text-muted mt-1 fw-semibold fs-7"></span>
                            </h3>
                            <div class="card-toolbar">
                                <button type="submit" class="btn btn-sm btn-light-success" name="store country">
                                    <!--begin::Svg Icon | path: icons/duotune/arrows/arr075.svg-->
                                    <span class="svg-icon svg-icon-2">
                                        @svg('fluentui-person-add-24')
                                    </span>
                                    <!--end::Svg Icon-->
                                    @if (request()->routeIs('country.edit'))
                                     {{  __(key:'Update :resource',replace:[ 'resource' => Str::lower(__('Country'))]) }}
                                    @else
                                        {{  __(key:'Store :resource',replace:[ 'resource' => Str::lower(__('Country'))]) }}
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
                                        className="col-md-12"
                                        type="text" name="name" label="Name" placeholder="Name"
                                        :required="true"
                                        :value="old('name')?:(request()->routeIs('country.edit') ?$country->name : '' )"
                                    />
                                </div>
                                <!--end::Input group-->
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
