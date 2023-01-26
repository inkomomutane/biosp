@extends('layouts.backend.app')
@section('dashboard_title', __(key:'Viewing :resource',replace:[ 'resource' => Str::lower(__('User'))]) . ' ' . $user->name)
@section('title', __(key:'Viewing :resource',replace:[ 'resource' => Str::lower(__('User'))]) . ' ' . $user->name)
@section('content')
    <div class="row justify-content-center pt-2">
        <!--begin::Post-->
        <div class="post d-flex flex-column-fluid" id="kt_post">
            <!--begin::Container-->
            <div id="kt_content_container" class="container-xxl">
                <!--begin::Navbar-->
                <div class="card mb-5 mb-xl-10">
                    <div class="card-body pt-9 pb-0">
                        <!--begin::Details-->
                        <div class="d-flex flex-wrap flex-sm-nowrap mb-3">
                            <!--begin: Pic-->
                            <div class="me-7 mb-4">
                                <div class="symbol symbol-100px symbol-lg-160px symbol-fixed position-relative">
                                    <!--begin::Avatar-->
                                    <div class="symbol symbol-50px me-5">
                                        <div
                                            class="symbol-label fs-1 fw-bolder text-primary bg-soft-blue text-uppercase">
                                            {{ $user->name[0] }} {{ explode(' ', $user->name)[1][0] ?? '' }}</div>
                                    </div>
                                    <!--end::Avatar-->
                                    <div
                                        class="position-absolute translate-middle bottom-0 start-90 mb-6 bg-info rounded-circle border border-4 border-white h-20px w-20px">
                                    </div>
                                </div>
                            </div>
                            <!--end::Pic-->
                            <!--begin::Info-->
                            <div class="flex-grow-1">
                                <!--begin::Title-->
                                <div class="d-flex justify-content-between align-items-start flex-wrap mb-2">
                                    <!--begin::User-->
                                    <div class="d-flex flex-column">
                                        <!--begin::Name-->
                                        <div class="d-flex align-items-center mb-2">
                                            <a href="#"
                                               class="text-gray-900 text-hover-primary fs-2 fw-bolder me-1 text-capitalize">{{ $user->name }}</a>
                                            <a href="#">
                                                <!--begin::Svg Icon | path: icons/duotune/general/gen026.svg-->
                                                <span class="svg-icon svg-icon-1 svg-icon-primary">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="24px" height="24px"
                                                         viewBox="0 0 24 24">
                                                        <path
                                                            d="M10.0813 3.7242C10.8849 2.16438 13.1151 2.16438 13.9187 3.7242V3.7242C14.4016 4.66147 15.4909 5.1127 16.4951 4.79139V4.79139C18.1663 4.25668 19.7433 5.83365 19.2086 7.50485V7.50485C18.8873 8.50905 19.3385 9.59842 20.2758 10.0813V10.0813C21.8356 10.8849 21.8356 13.1151 20.2758 13.9187V13.9187C19.3385 14.4016 18.8873 15.491 19.2086 16.4951V16.4951C19.7433 18.1663 18.1663 19.7433 16.4951 19.2086V19.2086C15.491 18.8873 14.4016 19.3385 13.9187 20.2758V20.2758C13.1151 21.8356 10.8849 21.8356 10.0813 20.2758V20.2758C9.59842 19.3385 8.50905 18.8873 7.50485 19.2086V19.2086C5.83365 19.7433 4.25668 18.1663 4.79139 16.4951V16.4951C5.1127 15.491 4.66147 14.4016 3.7242 13.9187V13.9187C2.16438 13.1151 2.16438 10.8849 3.7242 10.0813V10.0813C4.66147 9.59842 5.1127 8.50905 4.79139 7.50485V7.50485C4.25668 5.83365 5.83365 4.25668 7.50485 4.79139V4.79139C8.50905 5.1127 9.59842 4.66147 10.0813 3.7242V3.7242Z"
                                                            fill="#00A3FF"/>
                                                        <path class="permanent"
                                                              d="M14.8563 9.1903C15.0606 8.94984 15.3771 8.9385 15.6175 9.14289C15.858 9.34728 15.8229 9.66433 15.6185 9.9048L11.863 14.6558C11.6554 14.9001 11.2876 14.9258 11.048 14.7128L8.47656 12.4271C8.24068 12.2174 8.21944 11.8563 8.42911 11.6204C8.63877 11.3845 8.99996 11.3633 9.23583 11.5729L11.3706 13.4705L14.8563 9.1903Z"
                                                              fill="white"/>
                                                    </svg>
                                                </span>
                                                <!--end::Svg Icon-->
                                            </a>
                                            <span
                                                class="bg-light-success fw-bolder ms-2 fs-8 py-1 px-3 text-gray-600 text-uppercase">{{ $user?->roles()?->first()?->name ?? 'without role' }}</span>
                                        </div>
                                        <!--end::Name-->
                                        <!--begin::Info-->
                                        <div class="d-flex flex-wrap fw-bold fs-6 mb-4 pe-2">

                                            <a href="#"
                                               class="d-flex align-items-center text-capitalize text-gray-400 text-hover-primary mb-2">
                                                <!--begin::Svg Icon | path: icons/duotune/communication/com011.svg-->
                                                <span class="svg-icon svg-icon-4 me-1">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                         viewBox="0 0 24 24" fill="none">
                                                        <path opacity="0.3"
                                                              d="M21 19H3C2.4 19 2 18.6 2 18V6C2 5.4 2.4 5 3 5H21C21.6 5 22 5.4 22 6V18C22 18.6 21.6 19 21 19Z"
                                                              fill="black"/>
                                                        <path
                                                            d="M21 5H2.99999C2.69999 5 2.49999 5.10005 2.29999 5.30005L11.2 13.3C11.7 13.7 12.4 13.7 12.8 13.3L21.7 5.30005C21.5 5.10005 21.3 5 21 5Z"
                                                            fill="black"/>
                                                    </svg>
                                                </span>
                                                <!--end::Svg Icon-->{{ $user->email }}
                                            </a>
                                        </div>
                                        <!--end::Info-->
                                    </div>
                                    <!--end::User-->
                                </div>
                                <!--end::Title-->
                                <!--begin::Stats-->
                                <div class="d-flex flex-wrap flex-stack">
                                    <!--begin::Wrapper-->
                                    <div class="d-flex flex-column flex-grow-1 pe-8">
                                        <!--begin::Stats-->
                                        <div class="d-flex flex-wrap">
                                            <!--begin::Stat-->
                                            <div
                                                class="border border-gray-300 border-dashed rounded min-w-125px py-3 px-4 me-6 mb-3">
                                                <!--begin::Number-->
                                                <div class="d-flex align-items-center">
                                                    <!--begin::Svg Icon | path: icons/duotune/arrows/arr066.svg-->
                                                    <span class="svg-icon svg-icon-3 svg-icon-success me-2">
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="24"
                                                             height="24" viewBox="0 0 24 24" fill="none">
                                                            <rect opacity="0.5" x="13" y="6"
                                                                  width="13" height="2" rx="1"
                                                                  transform="rotate(90 13 6)" fill="black"/>
                                                            <path
                                                                d="M12.5657 8.56569L16.75 12.75C17.1642 13.1642 17.8358 13.1642 18.25 12.75C18.6642 12.3358 18.6642 11.6642 18.25 11.25L12.7071 5.70711C12.3166 5.31658 11.6834 5.31658 11.2929 5.70711L5.75 11.25C5.33579 11.6642 5.33579 12.3358 5.75 12.75C6.16421 13.1642 6.83579 13.1642 7.25 12.75L11.4343 8.56569C11.7467 8.25327 12.2533 8.25327 12.5657 8.56569Z"
                                                                fill="black"/>
                                                        </svg>
                                                    </span>
                                                    <!--end::Svg Icon-->
                                                    <div class="fs-2 fw-bolder" data-kt-countup="true"
                                                         data-kt-countup-value="4500" data-kt-countup-prefix="">
                                                        {{ $user->biosp ? 1 : $user->biosps()?->count() }}</div>
                                                </div>
                                                <!--end::Number-->
                                                <!--begin::Label-->
                                                <div class="fw-bold fs-6 text-gray-400">Biosp's</div>
                                                <!--end::Label-->
                                            </div>
                                            <!--end::Stat-->
                                        </div>
                                        <!--end::Stats-->
                                    </div>
                                    <!--end::Wrapper-->
                                </div>
                                <!--end::Stats-->
                            </div>
                            <!--end::Info-->
                        </div>
                        <!--end::Details-->
                    </div>
                </div>
                <!--end::Navbar-->

                @if (auth()->user()->ulid == $user->ulid)
                    <!--begin::Notice-->
                    <div
                        class="notice d-flex bg-light-warning rounded border-warning mb-4 border border-dashed min-w-lg-600px flex-shrink-0 p-6">
                        <!--begin::Icon-->
                        <!--begin::Svg Icon | path: icons/duotune/coding/cod004.svg-->
                        <span class="svg-icon svg-icon-2tx svg-icon-warning me-4">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                            <rect opacity="0.3" x="2" y="2" width="20" height="20" rx="10" fill="black"></rect>
                            <rect x="11" y="14" width="7" height="2" rx="1" transform="rotate(-90 11 14)"
                                  fill="black"></rect>
                            <rect x="11" y="17" width="2" height="2" rx="1" transform="rotate(-90 11 17)"
                                  fill="black"></rect>
                        </svg>
                    </span>
                        <!--end::Svg Icon-->
                        <!--end::Icon-->
                        <!--begin::Wrapper-->
                        <div class="d-flex flex-stack flex-grow-1 flex-wrap flex-md-nowrap">
                            <!--begin::Content-->
                            <div class="mb-3 mb-md-0 fw-bold">
                                <h4 class="text-warning fw-bolder">{{__('Alert')}}!</h4>
                                <div
                                    class="fs-6 text-gray-700 pe-7">{{__('Is not allowed for Super Admin Users change role for it self.')}}
                                    &nbsp; <strong class="text-info fw-bolder">[ {{__('Security Policy')}} ]</strong>
                                </div>
                            </div>
                            <!--end::Content-->
                        </div>
                        <!--end::Wrapper-->
                    </div>
                    <!--end::Notice-->
                @endif
                @if (auth()->user()->ulid != $user->ulid)
                    <form action="{{ route('user.grant_role', $user) }}" method="post">
                        @csrf
                        @endif
                        <!--begin::details View-->
                        <div class="card mb-5 mb-xl-10" id="kt_profile_details_view">
                            <!--begin::Card header-->
                            <div class="card-header cursor-pointer">
                                <!--begin::Card title-->
                                <div class="card-title m-0">
                                    <h3 class="fw-bolder m-0">{{ __(key:':resource details',replace:[ 'resource' => Str::lower(__('User'))]) }}</h3>
                                </div>
                                <!--end::Card title-->
                                <!--begin::Action-->

                                <button
                                    @if (auth()->user()->ulid == $user->ulid) class="btn btn-info align-self-center disabled"
                                    @else type="submit" class="btn btn-info align-self-center" @endif>
                            <span class="svg-icon svg-icon-2">
                                @svg('fluentui-person-add-24')
                            </span> {{ __(key:'Update :resource',replace:[ 'resource' => Str::lower(__('User'))]) }}
                                </button>
                                <!--end::Action-->
                            </div>
                            <!--begin::Card header-->
                            <!--begin::Card body-->
                            <div class="card-body p-9">
                                <!--begin::Row-->
                                <div class="row mb-7">
                                    <!--begin::Label-->
                                    <label class="col-lg-4 fw-bold text-muted">{{ __('Full name') }}</label>
                                    <!--end::Label-->
                                    <!--begin::Col-->
                                    <div class="col-lg-8">
                                        <span
                                            class="fw-bolder fs-6 text-gray-800 text-capitalize">{{ $user->name }}</span>
                                    </div>
                                    <!--end::Col-->
                                </div>
                                <!--end::Row-->
                                <!--begin::Input group-->
                                <div class="row mb-7">
                                    <!--begin::Label-->
                                    <label class="col-lg-4 fw-bold text-muted">{{ __('Email Address') }}</label>
                                    <!--end::Label-->
                                    <!--begin::Col-->
                                    <div class="col-lg-8 fv-row">
                                        <span
                                            class="fw-bold text-gray-800 fs-6 text-capitalize">{{ $user->email }}</span>
                                    </div>
                                    <!--end::Col-->
                                </div>
                                <!--end::Input group-->

                                <!--begin::Input group-->
                                <div class="row mb-7">
                                    <!--begin::Label-->
                                    <label class="col-lg-4 fw-bold text-muted">{{ __('Change user role') }}</label>
                                    <x-forms.select
                                        :disabled="(auth()->user()->ulid === $user->ulid)"
                                        name="role"
                                        :multiple="false"
                                        placeholder="Change user role"
                                        :options="$roles->pluck('name','id')->toArray()"
                                        :selected="$user->roles->pluck('name','id')->toArray()"
                                    />
                                </div>
                                <!--end::Input group-->


                                <!--begin::Input group-->
                                <div class="row mb-7">
                                    <!--begin::Label-->
                                    <label class="col-lg-4 fw-bold text-muted">{{ __('Change user biosps') }}</label>
                                    <x-forms.select
                                        :disabled="(auth()->user()->ulid === $user->ulid)"
                                        name="biosps[]"
                                        :multiple="true"
                                        placeholder="Biosps"
                                        :options="$biosps->pluck('name','ulid')->toArray()"
                                        :selected="$user->biosps->pluck('name','ulid')->toArray()"
                                    />
                                </div>
                                <!--end::Input group-->
                            </div>
                            <!--end::Card body-->
                        </div>
                        <!--end::details View-->
                        @if (auth()->user()->ulid !== $user->ulid)
                    </form>
                @endif
            </div>
            <!--end::Container-->
        </div>
        <!--end::Post-->
    </div>
@endsection
