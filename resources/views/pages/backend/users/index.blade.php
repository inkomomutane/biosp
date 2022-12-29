@extends('layouts.backend.app')
@section('dashboard_title', 'Create Users')
@section('title', 'Create Users')
@section('content')
    <div class="row justify-content-center pt-2">
        <div class="row">
            <!--begin::Col-->
            <div class="row">
                <div class="card mb-5 mb-xl-7">
                    <!--begin::Header-->
                    <div class="card-header border-0 pt-3">
                        <h3 class="card-title align-items-start flex-column">
                            <span class="card-label fw-bold fs-3 mb-1">Users</span>
                            <span class="text-muted mt-1 fw-semibold fs-7"></span>
                        </h3>
                        <div class="card-toolbar">
                            <a href="#" class="btn btn-sm btn-light-info">
                                <!--begin::Svg Icon | path: icons/duotune/arrows/arr075.svg-->
                                <span class="svg-icon svg-icon-2">
                                    @svg('fluentui-person-add-24')
                                </span>
                                <!--end::Svg Icon-->Create User
                            </a>
                        </div>
                    </div>
                    <!--end::Header-->
                    <!--begin::Body-->
                    <div class="card-body py-3">
                        <!--begin::Table container-->
                        <div class="">
                            <!--begin::Table-->
                            <table  class="table table-row-bordered responsive nowrap" style="width: 100%">
                                <!--begin::Table head-->
                                <thead>
                                    <tr class="fw-bolder fs-7 text-light bg-dark rounded">
                                        <th class="ps-4 rounded-start">User</th>
                                        <th class="">Previleges</th>
                                        <th class="">Email</th>
                                        <th class=" text-center rounded-end">Actions</th>
                                    </tr>
                                </thead>
                                <!--end::Table head-->
                                <!--begin::Table body-->
                                <tbody>
                                    @forelse ($users as $user)
                                    <tr>
                                        <td>
                                            <div class="d-flex align-items-center">
                                                <div class="symbol symbol-50px me-5">
                                                    <div class="symbol-label fs-2 fw-bold text-primary bg-soft-blue text-uppercase">
                                                    {{ explode(' ', $user->name )[0][0] }}
                                                    {{ explode(' ', $user->name )[1][0] ?? '' }}
                                                    </div>
                                                </div>
                                                <div class="d-flex justify-content-start flex-column">
                                                    <a href="#"
                                                        class="text-dark fw-bold text-hover-primary mb-1 fs-6">
                                                        {{$user->name}}
                                                        </a>
                                                    <span class="text-muted fw-semibold text-muted d-block fs-7">{{$user->email}}</span>
                                                </div>
                                            </div>
                                        </td>
                                        <td>
                                            <a href="#"
                                                class="text-dark fw-bold text-hover-primary d-block mb-1 fs-6">
                                               Level
                                            </a>
                                            <span class="text-muted fw-semibold text-muted d-block fs-7"> {{ Str::upper($user->roles()?->first()?->name ?? 'Without roles') }} </span>
                                        </td>
                                        <td class="">
                                            <a href="#"
                                                class="btn btn-icon-info  btn-outline btn-outline-dashed btn-outline-info btn-active-light-info text-capitalize">

                                                {{ $user->email }} </a>

                                        </td>

                                        <td class="text-end">
                                            <a href=""
                                                class="btn btn-icon btn-bg-light btn-active-color-primary btn-sm me-1"
                                                data-bs-toggle="tooltip" data-bs-placement="top" title="Edit user">
                                                <!--begin::Svg Icon | path: icons/duotune/art/art005.svg-->
                                                <span class="svg-icon svg-icon-3">
                                                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                                                        xmlns="http://www.w3.org/2000/svg">
                                                        <path opacity="0.3"
                                                            d="M21.4 8.35303L19.241 10.511L13.485 4.755L15.643 2.59595C16.0248 2.21423 16.5426 1.99988 17.0825 1.99988C17.6224 1.99988 18.1402 2.21423 18.522 2.59595L21.4 5.474C21.7817 5.85581 21.9962 6.37355 21.9962 6.91345C21.9962 7.45335 21.7817 7.97122 21.4 8.35303ZM3.68699 21.932L9.88699 19.865L4.13099 14.109L2.06399 20.309C1.98815 20.5354 1.97703 20.7787 2.03189 21.0111C2.08674 21.2436 2.2054 21.4561 2.37449 21.6248C2.54359 21.7934 2.75641 21.9115 2.989 21.9658C3.22158 22.0201 3.4647 22.0084 3.69099 21.932H3.68699Z"
                                                            fill="currentColor"></path>
                                                        <path
                                                            d="M5.574 21.3L3.692 21.928C3.46591 22.0032 3.22334 22.0141 2.99144 21.9594C2.75954 21.9046 2.54744 21.7864 2.3789 21.6179C2.21036 21.4495 2.09202 21.2375 2.03711 21.0056C1.9822 20.7737 1.99289 20.5312 2.06799 20.3051L2.696 18.422L5.574 21.3ZM4.13499 14.105L9.891 19.861L19.245 10.507L13.489 4.75098L4.13499 14.105Z"
                                                            fill="currentColor"></path>
                                                    </svg>
                                                </span>
                                                <!--end::Svg Icon-->
                                            </a>
                                            <a href="#" class="btn btn-icon btn-bg-light btn-active-color-primary btn-sm"
                                                data-bs-toggle="tooltip" data-bs-placement="top" title="Delete user">
                                                <!--begin::Svg Icon | path: icons/duotune/general/gen027.svg-->
                                                <span class="svg-icon svg-icon-3">
                                                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                                                        xmlns="http://www.w3.org/2000/svg">
                                                        <path
                                                            d="M5 9C5 8.44772 5.44772 8 6 8H18C18.5523 8 19 8.44772 19 9V18C19 19.6569 17.6569 21 16 21H8C6.34315 21 5 19.6569 5 18V9Z"
                                                            fill="currentColor"></path>
                                                        <path opacity="0.5"
                                                            d="M5 5C5 4.44772 5.44772 4 6 4H18C18.5523 4 19 4.44772 19 5V5C19 5.55228 18.5523 6 18 6H6C5.44772 6 5 5.55228 5 5V5Z"
                                                            fill="currentColor"></path>
                                                        <path opacity="0.5"
                                                            d="M9 4C9 3.44772 9.44772 3 10 3H14C14.5523 3 15 3.44772 15 4V4H9V4Z"
                                                            fill="currentColor"></path>
                                                    </svg>
                                                </span>
                                                <!--end::Svg Icon-->
                                            </a>
                                        </td>
                                    </tr>
                                    @empty
                                    <tr>
                                        <td colspan="5">Nenuma aplicação foi encontrada</td>
                                    </tr>
                                    @endforelse
                                </tbody>
                                <!--end::Table body-->

                            </table>
                            {{ $users->links() }}
                            <!--end::Table-->
                        </div>
                        <!--end::Table container-->
                    </div>
                    <!--begin::Body-->
                </div>
            </div>
            <!--end::Col-->
        </div>
    </div>
@endsection
