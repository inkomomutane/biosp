@extends('layouts.backend.app')
@section('dashboard_title', request()->routeIs('neighborhood.edit') ?  __(key:'Update :resource',replace:[ 'resource' => Str::lower(__('Neighborhood'))]) . ' ' .
    $neighborhood->name : __(key:'Create :resource',replace:[ 'resource' => Str::lower(__('Neighborhood'))]))
@section('title', request()->routeIs('neighborhood.edit') ? __(key:'Update :resource',replace:[ 'resource' => Str::lower(__('Neighborhood'))]) . ' ' . $neighborhood->name :
    __(key:'Create :resource',replace:[ 'resource' => Str::lower(__('Neighborhood'))]))
@section('content')
    <div class="row justify-content-center pt-2">
        <div class="row">
            <!--begin::Col-->
            <form
                action="@if (request()->routeIs('neighborhood.edit')) {{ route('neighborhood.update', $neighborhood->uuid) }} @else {{ route('neighborhood.store') }} @endif"
                method="post">
                @csrf

                @if (request()->routeIs('neighborhood.edit'))
                    @method('PATCH')
                @endif

                <div class="row">
                    <div class="card mb-5 mb-xl-7">
                        <!--begin::Header-->
                        <div class="card-header border-0 pt-3">
                            <h3 class="card-title align-items-start flex-column">
                                <span class="card-label fw-bold fs-3 mb-1">
                                    @if (request()->routeIs('neighborhood.edit'))
                                        {{ __(key:'Update :resource',replace:[ 'resource' => Str::lower(__('Neighborhood'))]) }}
                                    @else
                                        {{ __(key:'Create :resource',replace:[ 'resource' => Str::lower(__('Neighborhood'))])}}
                                    @endif

                                </span>
                                <span class="text-muted mt-1 fw-semibold fs-7"></span>
                            </h3>
                            <div class="card-toolbar">
                                <button type="submit" class="btn btn-sm btn-light-success" name="store neighborhood">
                                    <!--begin::Svg Icon | path: icons/duotune/arrows/arr075.svg-->
                                    <span class="svg-icon svg-icon-2">
                                        @svg('fluentui-person-add-24')
                                    </span>
                                    <!--end::Svg Icon-->
                                    @if (request()->routeIs('neighborhood.edit'))
                                        {{ __(key:'Update :resource',replace:[ 'resource' => Str::lower(__('Neighborhood'))]) }}
                                    @else
                                        {{ __(key:'Store :resource',replace:[ 'resource' => Str::lower(__('Neighborhood'))]) }}
                                    @endif
                                </button>
                            </div>
                        </div>
                        <!--end::Header-->
                        <!--begin::Body-->
                        <div class="card-body py-3">
                            <!--begin::Table container-->
                            <!--begin::Form-->
                            <!--begin::Input group-->
                            <div class="row mb-5">
                            <x-forms.input
                                type="text" name="name" label="Name" placeholder="Name"
                                :required="false"
                                :value="old('name')?:(request()->routeIs('neighborhood.edit') ?$neighborhood->name : '' )"
                            />
                            <x-forms.select
                                label="Province"
                                :multiple="false"
                                name="province_uuid"
                                placeholder="Province"
                                :options="$provinces->pluck('name','uuid')->toArray()"
                                :selected="request()->routeIs('neighborhood.edit') ? array($neighborhood->province->uuid => $neighborhood->province->name) : [] "
                            />
                        </div>
                        <!--end::Input group-->
                        <!--end::Form-->
                    </div>
                    <!--end::Table container-->
                </div>
                <!--begin::Body-->
        </div>
        </form>
        <!--end::Col-->
    </div>
    </div>
@endsection
