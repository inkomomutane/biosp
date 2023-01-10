
<div class="content d-flex flex-column flex-column-fluid pt-2 pb-6" id="kt_content">
    @include('layouts.backend.partials.toolbar')
    <!--begin::Post-->
    <div class="post d-flex flex-column-fluid" id="kt_post">
        <!--begin::Container-->
        <div id="kt_content_container" class="container-xxl">

            @yield('content')
        </div>
        <!--end::Container-->
    </div>
    <!--end::Post-->
    <!--begin::Modal - Create App-->
    @yield('modal')
    <!--end::Modal - Create App-->
</div>
