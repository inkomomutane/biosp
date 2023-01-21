@extends('layouts.backend.app')
@section('dashboard_title', request()->routeIs('biosp.edit') ? __(key:'Update :resource',replace:[ 'resource' => Str::lower(__('Biosp'))]) . ' ' . $biosp->name :
    __(key:'Create :resource',replace:[ 'resource' => Str::lower(__('Biosp'))]))
@section('title', request()->routeIs('biosp.edit') ? __(key:'Update :resource',replace:[ 'resource' => Str::lower(__('Biosp'))]) . ' ' . $biosp->name : __(key:'Create :resource',replace:[ 'resource' => Str::lower(__('Biosp'))]))
@section('content')
    <div class="row justify-content-center pt-2">
        <div class="row">
            <!--begin::Col-->
            <form
                action="@if (request()->routeIs('biosp.edit')) {{ route('biosp.update', $biosp->uuid) }} @else {{ route('biosp.store') }} @endif"
                method="post">
                @csrf

                @if (request()->routeIs('biosp.edit'))
                    @method('PATCH')
                @endif

                <div class="row">
                    <div class="card mb-5 mb-xl-7">
                        <!--begin::Header-->
                        <div class="card-header border-0 pt-3">
                            <h3 class="card-title align-items-start flex-column">
                                <span class="card-label fw-bold fs-3 mb-1">
                                    @if (request()->routeIs('biosp.edit'))
                                        {{ __(key:'Update :resource',replace:[ 'resource' => Str::lower(__('Biosp'))])}}
                                    @else
                                        {{ __(key:'Create :resource',replace:[ 'resource' => Str::lower(__('Biosp'))]) }}
                                    @endif

                                </span>
                                <span class="text-muted mt-1 fw-semibold fs-7"></span>
                            </h3>
                            <div class="card-toolbar">
                                <button type="submit" class="btn btn-sm btn-light-success" name="store biosp">
                                    <!--begin::Svg Icon | path: icons/duotune/arrows/arr075.svg-->
                                    <span class="svg-icon svg-icon-2">
                                        @svg('fluentui-person-add-24')
                                    </span>
                                    <!--end::Svg Icon-->
                                    @if (request()->routeIs('biosp.edit'))
                                        {{ __(key:'Update :resource',replace:[ 'resource' => Str::lower(__('Biosp'))]) }}
                                    @else
                                        {{ __(key:'Store :resource',replace:[ 'resource' => Str::lower(__('Biosp'))]) }}
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
                                        className="col-md-4"
                                        type="text" name="name" label="Name" placeholder="Name"
                                        :required="true"
                                        :value="old('name')?:(request()->routeIs('biosp.edit') ?$biosp->name : '' )"/>
                                    <x-forms.input
                                        className="col-md-4"
                                        type="text" name="project_name" label="Project name" placeholder="Project name"
                                        :required="true"
                                        :value="old('project_name')?:(request()->routeIs('biosp.edit') ?$biosp->project_name : '' )"/>
                                    <x-forms.select
                                        className="col-md-4"
                                        label="Neighborhood"
                                        :multiple="false"
                                        name="neighborhood_uuid"
                                        placeholder="Neighborhood"
                                        :options="$neighborhoods->pluck('name','uuid')->toArray()"
                                        :selected="request()->routeIs('biosp.edit') ? array($biosp->neighborhood->uuid => $biosp->neighborhood->name ) : [] "
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
