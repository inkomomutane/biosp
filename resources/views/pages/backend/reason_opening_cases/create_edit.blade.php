@extends('layouts.backend.app')
@section('dashboard_title', request()->routeIs('reason_opening_case.edit') ? __(key:'Update :resource',replace:[ 'resource' => Str::lower(__('Reason of opening case'))]) . ' ' . $reason_opening_case->name : __(key:'Create :resource',replace:[ 'resource' => Str::lower(__('Reason of opening case'))]))
@section('title', request()->routeIs('reason_opening_case.edit') ?  __(key:'Update :resource',replace:[ 'resource' => Str::lower(__('Reason of opening case'))]) . ' ' . $reason_opening_case->name :  __(key:'Create :resource',replace:[ 'resource' => Str::lower(__('Reason of opening case'))]))
@section('content')
    <div class="row justify-content-center pt-2">
        <div class="row">
            <!--begin::Col-->
            <form
                action="@if (request()->routeIs('reason_opening_case.edit')) {{ route('reason_opening_case.update', $reason_opening_case->uuid) }} @else {{ route('reason_opening_case.store') }} @endif"
                method="post">
                @csrf

                @if (request()->routeIs('reason_opening_case.edit'))
                    @method('PATCH')
                @endif

                <div class="row">
                    <div class="card mb-5 mb-xl-7">
                        <!--begin::Header-->
                        <div class="card-header border-0 pt-3">
                            <h3 class="card-title align-items-start flex-column">
                                <span class="card-label fw-bold fs-3 mb-1">
                                    @if (request()->routeIs('reason_opening_case.edit'))
                                        {{  __(key:'Update :resource',replace:[ 'resource' => Str::lower(__('Reason of opening case'))]) }}
                                    @else
                                        {{  __(key:'Create :resource',replace:[ 'resource' => Str::lower(__('Reason of opening case'))]) }}
                                    @endif

                                </span>
                                <span class="text-muted mt-1 fw-semibold fs-7"></span>
                            </h3>
                            <div class="card-toolbar">
                                <button type="submit" class="btn btn-sm btn-light-success" name="store reason_opening_case">
                                    <!--begin::Svg Icon | path: icons/duotune/arrows/arr075.svg-->
                                    <span class="svg-icon svg-icon-2">
                                        @svg('fluentui-people-community-20-o')
                                    </span>
                                    <!--end::Svg Icon-->
                                    @if (request()->routeIs('reason_opening_case.edit'))
                                     {{  __(key:'Update :resource',replace:[ 'resource' => Str::lower(__('Reason of opening case'))]) }}
                                    @else
                                        {{  __(key:'Store :resource',replace:[ 'resource' => Str::lower(__('Reason of opening case'))]) }}
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
                                        :value="old('name')?:(request()->routeIs('reason_opening_case.edit') ?$reason_opening_case->name : '' )"
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
