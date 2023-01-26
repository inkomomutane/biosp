@extends('layouts.backend.app')
@section('dashboard_title', request()->routeIs('forwarded_service.edit') ? __(key:'Update :resource',replace:[ 'resource' => Str::lower(__('Forwarded service'))]) . ' ' . $forwarded_service->name : __(key:'Create :resource',replace:[ 'resource' => Str::lower(__('Forwarded service'))]))
@section('title', request()->routeIs('forwarded_service.edit') ?  __(key:'Update :resource',replace:[ 'resource' => Str::lower(__('Forwarded service'))]) . ' ' . $forwarded_service->name :  __(key:'Create :resource',replace:[ 'resource' => Str::lower(__('Forwarded service'))]))
@section('content')
    <div class="row justify-content-center pt-2">
        <div class="row">
            <!--begin::Col-->
            <form
                action="@if (request()->routeIs('forwarded_service.edit')) {{ route('forwarded_service.update', $forwarded_service->ulid) }} @else {{ route('forwarded_service.store') }} @endif"
                method="post">
                @csrf

                @if (request()->routeIs('forwarded_service.edit'))
                    @method('PATCH')
                @endif

                <div class="row">
                    <div class="card mb-5 mb-xl-7">
                        <!--begin::Header-->
                        <div class="card-header border-0 pt-3">
                            <h3 class="card-title align-items-start flex-column">
                                <span class="card-label fw-bold fs-3 mb-1">
                                    @if (request()->routeIs('forwarded_service.edit'))
                                        {{  __(key:'Update :resource',replace:[ 'resource' => Str::lower(__('Forwarded service'))]) }}
                                    @else
                                        {{  __(key:'Create :resource',replace:[ 'resource' => Str::lower(__('Forwarded service'))]) }}
                                    @endif

                                </span>
                                <span class="text-muted mt-1 fw-semibold fs-7"></span>
                            </h3>
                            <div class="card-toolbar">
                                <button type="submit" class="btn btn-sm btn-light-success" name="store forwarded_service">
                                    <!--begin::Svg Icon | path: icons/duotune/arrows/arr075.svg-->
                                    <span class="svg-icon svg-icon-2">
                                        @svg('fluentui-square-arrow-forward-16')
                                    </span>
                                    <!--end::Svg Icon-->
                                    @if (request()->routeIs('forwarded_service.edit'))
                                     {{  __(key:'Update :resource',replace:[ 'resource' => Str::lower(__('Forwarded service'))]) }}
                                    @else
                                        {{  __(key:'Store :resource',replace:[ 'resource' => Str::lower(__('Forwarded service'))]) }}
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
                                        :value="old('name')?:(request()->routeIs('forwarded_service.edit') ?$forwarded_service->name : '' )"
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
