<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
@include('layouts.backend.partials.head')

<body id="kt_body" class="bg-dark" style="--kt-toolbar-height:55px;--kt-toolbar-height-tablet-and-mobile:55px ">
    <div class="d-flex flex-column flex-root">
        <!--begin::Page-->
        <div class="page d-flex flex-row flex-column-fluid">
            <div class="pt-13 d-flex flex-column flex-row-fluid" id="kt_wrapper">
                <!--begin::Root-->
                <div class="d-flex flex-column flex-root">
                    <!--begin::Authentication - Sign-in -->
                    <div class="d-flex flex-column flex-column-fluid bgi-position-y-bottom position-x-center bgi-no-repeat bgi-size-contain bgi-attachment-fixed resourse_background_image"
                        data-image="illustration/login-dark.png">
                        <!--begin::Content-->
                        <div class="d-flex flex-center flex-column flex-column-fluid p-10 pt-0  pb-lg-20">
                            <!--begin::Logo-->
                            <a href="" class="mb-12">
                                <img alt="Logo" src="" class="resource_image h-60px"
                                    data-image="logo/logo_default.svg" />
                            </a>
                            <!--end::Logo-->
                            <!--begin::Wrapper-->
                            <div class="w-lg-500px bg-body rounded shadow-sm p-10 p-lg-15 mx-auto">
                                @yield('content')
                            </div>
                            <!--end::Wrapper-->
                        </div>
                        <!--end::Content-->
                    </div>
                    <!--end::Authentication - Sign-in-->
                </div>
                <!--end::Root-->
            </div>

        </div>
    </div>

</body>
