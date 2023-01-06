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
                                    <!--begin::Col-->
                                    <div class="col-md-4 fv-row">
                                        <!--begin::Label-->
                                        <label class="required fs-5 fw-bold mb-2">{{ __('Name') }}</label>
                                        <!--end::Label-->
                                        <!--begin::Input-->
                                        <input type="text" class="form-control form-control-solid"
                                            placeholder="{{ __('Name') }}" name="name" required
                                            value="@if (old('name')) {{ old('name') }}@elseif(request()->routeIs('biosp.edit')){{ $biosp->name }} @endif" />
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
                                    <div class="col-md-4 fv-row">
                                        <!--begin::Label-->
                                        <label class="required fs-5 fw-bold mb-2">{{ __('Project name') }}</label>
                                        <!--end::Label-->
                                        <!--begin::Input-->
                                        <input type="text" class="form-control form-control-solid"
                                               placeholder="{{ __('Project name') }}" name="project_name" required
                                               value="@if (old('project_name')) {{ old('project_name') }}@elseif(request()->routeIs('biosp.edit')){{ $biosp->project_name }} @endif" />
                                        <!--end::Input-->
                                        @error('project_name')
                                        <!--begin::Error full name -->
                                        <span class="fv-plugins-message-container fw-bolder invalid-feedback">{{ $message }}</span>
                                        <!--end::Error full name-->
                                        @enderror

                                    </div>
                                    <!--end::Col-->
                                    <!--begin::Col-->
                                    <div class="col-md-4 fv-row">
                                        <!--begin::Label-->
                                        <label class="required fs-5 fw-bold mb-2">{{ __('Neighborhood') }}</label>
                                        <!--end::Label-->
                                        <!--begin::Input-->
                                        <select name="neighborhood_uuid" class="form-select form-select-solid"
                                            data-control="select2" data-placeholder="{{ __(key:'Select a :resource name',replace:[ 'resource' => Str::lower(__('Biosp'))]) }}">
                                            @foreach ($neighborhoods as $neighborhood)
                                                <option value="{{ $neighborhood->uuid }}"
                                                    @if (request()->routeIs('biosp.edit') && $biosp->neighborhood->uuid == $neighborhood->uuid) selected @endif><span
                                                        class="text-capitalize text-mutted"> {{ $neighborhood->name }}</span>
                                                </option>
                                            @endforeach
                                        </select>
                                        <!--end::Input-->
                                        @error('neighborhood_uuid')
                                            <!--begin::Error neighborhood -->
                                            <span
                                                class="fv-plugins-message-container fw-bolder invalid-feedback">{{ $message }}</span>
                                            <!--end::Error neighborhood-->
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
