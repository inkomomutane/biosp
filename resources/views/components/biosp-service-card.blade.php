<!--begin::Col-->
<div class="col-sm-6 mb-5 mb-xl-10">
    <!--begin::List widget 2-->
    <div class="card card-flush h-lg-100">
        <!--begin::Header-->
        <div class="card-header pt-5">
            <!--begin::Title-->
            <h3 class="card-title align-items-start flex-column">
                <span class="card-label fw-bolder text-dark">{{$name}}</span>
            </h3>
            <!--end::Title-->
            <!--begin::Toolbar-->
            <div class="card-toolbar">
                <!--begin::Menu-->
                 {{ $buttons  }}
                <!--end::Menu-->
            </div>
            <!--end::Toolbar-->
        </div>
        <!--end::Header-->
        <!--begin::Body-->
        <div class="card-body pt-5">
          @forelse($services as $service)
                <!--begin::Item-->
                <div class="d-flex flex-stack">
                    <!--begin::Title-->
                    <span class="text-mutted opacity-75-hover fs-6 fw-bold">{{$service->name}}</span>
                    <!--end::Title-->
                </div>
                <!--end::Item-->
              @if(!$loop->last)
                    <!--begin::Separator-->
                    <div class="separator separator-dashed my-3"></div>
                    <!--end::Separator-->
              @endif
            @empty
          @endforelse
        </div>
        <!--end::Body-->
    </div>
    <!--end::List widget 2-->
</div>
<!--end::Col-->
