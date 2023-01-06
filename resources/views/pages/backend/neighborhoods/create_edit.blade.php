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
                            <div class="">
                                <!--begin::Form-->
                                <!--begin::Input group-->
                                <div class="row mb-5">
                                    <!--begin::Col-->
                                    <div class="col-md-6 fv-row">
                                        <!--begin::Label-->
                                        <label class="required fs-5 fw-bold mb-2">{{ __('Name') }}</label>
                                        <!--end::Label-->
                                        <!--begin::Input-->
                                        <input type="text" class="form-control form-control-solid"
                                            placeholder="{{ __('Name') }}" name="name" required
                                            value="@if (old('name')) {{ old('name') }}@elseif(request()->routeIs('neighborhood.edit')){{ $neighborhood->name }} @endif" />
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
                                        <label class="required fs-5 fw-bold mb-2">{{ __('Province') }}</label>
                                        <!--end::Label-->
                                        <!--begin::Input-->
                                        <select name="province_uuid" class="form-select form-select-solid"
                                            data-control="select2" data-placeholder="{{ __(key:'Select a :resource name',replace:[ 'resource' => Str::lower(__('Neighborhood'))]) }}">
                                            @foreach ($provinces as $province)
                                                <option value="{{ $province->uuid }}"
                                                    @if (request()->routeIs('neighborhood.edit') && $neighborhood->province->uuid == $province->uuid) selected @endif><span
                                                        class="text-capitalize text-mutted"> {{ $province->name }}</span>
                                                </option>
                                            @endforeach
                                        </select>
                                        <!--end::Input-->
                                        @error('province_uuid')
                                            <!--begin::Error Email -->
                                            <span
                                                class="fv-plugins-message-container fw-bolder invalid-feedback">{{ $message }}</span>
                                            <!--end::Error Email-->
                                        @enderror

                                    </div>
                                    <!--end::Col-->
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
