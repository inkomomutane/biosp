<!--begin::Col-->
<div class="col-sm-6 mb-5 mb-xl-10">
    <!--begin::List widget 2-->
    <div class="card card-flush h-lg-100">
        <!--begin::Header-->
        <div class="card-header pt-5">
            <!--begin::Title-->
            <h3 class="card-title align-items-start flex-column col-9">
                <span class="card-label fw-bolder text-dark">{{$name}}</span>
            </h3>
            <!--end::Title-->
            <!--begin::Toolbar-->
            <div class="card-toolbar col-2">
                <!--begin::Menu-->

                <button type="button"
                        class="btn btn-icon btn-color-gray-400 btn-active-color-primary justify-content-end"
                        data-bs-toggle="modal" data-bs-target="#{{$keyCardComponent}}">
                    <span class="svg-icon svg-icon-1">
                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path opacity="0.3"
                                  d="M22.1 11.5V12.6C22.1 13.2 21.7 13.6 21.2 13.7L19.9 13.9C19.7 14.7 19.4 15.5 18.9 16.2L19.7 17.2999C20 17.6999 20 18.3999 19.6 18.7999L18.8 19.6C18.4 20 17.8 20 17.3 19.7L16.2 18.9C15.5 19.3 14.7 19.7 13.9 19.9L13.7 21.2C13.6 21.7 13.1 22.1 12.6 22.1H11.5C10.9 22.1 10.5 21.7 10.4 21.2L10.2 19.9C9.4 19.7 8.6 19.4 7.9 18.9L6.8 19.7C6.4 20 5.7 20 5.3 19.6L4.5 18.7999C4.1 18.3999 4.1 17.7999 4.4 17.2999L5.2 16.2C4.8 15.5 4.4 14.7 4.2 13.9L2.9 13.7C2.4 13.6 2 13.1 2 12.6V11.5C2 10.9 2.4 10.5 2.9 10.4L4.2 10.2C4.4 9.39995 4.7 8.60002 5.2 7.90002L4.4 6.79993C4.1 6.39993 4.1 5.69993 4.5 5.29993L5.3 4.5C5.7 4.1 6.3 4.10002 6.8 4.40002L7.9 5.19995C8.6 4.79995 9.4 4.39995 10.2 4.19995L10.4 2.90002C10.5 2.40002 11 2 11.5 2H12.6C13.2 2 13.6 2.40002 13.7 2.90002L13.9 4.19995C14.7 4.39995 15.5 4.69995 16.2 5.19995L17.3 4.40002C17.7 4.10002 18.4 4.1 18.8 4.5L19.6 5.29993C20 5.69993 20 6.29993 19.7 6.79993L18.9 7.90002C19.3 8.60002 19.7 9.39995 19.9 10.2L21.2 10.4C21.7 10.5 22.1 11 22.1 11.5ZM12.1 8.59998C10.2 8.59998 8.6 10.2 8.6 12.1C8.6 14 10.2 15.6 12.1 15.6C14 15.6 15.6 14 15.6 12.1C15.6 10.2 14 8.59998 12.1 8.59998Z"
                                  fill="black"/>
                            <path
                                d="M17.1 12.1C17.1 14.9 14.9 17.1 12.1 17.1C9.30001 17.1 7.10001 14.9 7.10001 12.1C7.10001 9.29998 9.30001 7.09998 12.1 7.09998C14.9 7.09998 17.1 9.29998 17.1 12.1ZM12.1 10.1C11 10.1 10.1 11 10.1 12.1C10.1 13.2 11 14.1 12.1 14.1C13.2 14.1 14.1 13.2 14.1 12.1C14.1 11 13.2 10.1 12.1 10.1Z"
                                fill="black"/>
                        </svg>
                    </span>
                    {{ __('Config') }}
                    <!--end::Svg Icon-->
                </button>

                <!--end::Menu-->
            </div>
            <!--end::Toolbar-->
        </div>
        <!--end::Header-->
        <!--begin::Body-->
        <div class="card-body pt-5">
            @forelse($selectedServices as $service)
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
    <form action="{{$route}}" method="@if(in_array($method,["post","get"])){{$method}}@else{{'post'}}@endif"
          id="form_{{$keyCardComponent}}">
        @csrf @if(!in_array($method,["post","get"]))
            @method(Str::upper($method))
        @endif
        <x-modal :trigger="$keyCardComponent" title="{{ __(key:'Assign :resource',replace: [
        'resource' => $serviceName ]
        )  }}">
            <x-slot:body>
                <x-forms.select
                    :selected="$selectedServices->pluck('name','uuid')->toArray()"
                    :options="$services->pluck('name','uuid')->toArray()"
                    :label="__($serviceName)"
                    name="services[]"
                    :placeholder="__($serviceName)"
                    :multiple="true"
                    class-name="col-md-12"
                />
            </x-slot:body>
            <x-slot:buttons>
                <x-modal-button title="cancel" class-name="btn-danger" :dismiss="true">
                    <x-slot:title>
                        <span class="svg-icon svg-icon-1">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"><path opacity="0.3" d="M6.7 19.4L5.3 18C4.9 17.6 4.9 17 5.3 16.6L16.6 5.3C17 4.9 17.6 4.9 18 5.3L19.4 6.7C19.8 7.1 19.8 7.7 19.4 8.1L8.1 19.4C7.8 19.8 7.1 19.8 6.7 19.4Z" fill="black"/><path d="M19.5 18L18.1 19.4C17.7 19.8 17.1 19.8 16.7 19.4L5.40001 8.1C5.00001 7.7 5.00001 7.1 5.40001 6.7L6.80001 5.3C7.20001 4.9 7.80001 4.9 8.20001 5.3L19.5 16.6C19.9 16.9 19.9 17.6 19.5 18Z" fill="black"/></svg>
                        </span>
                        {{__('Cancel')}}
                    </x-slot:title>
                </x-modal-button>

                <x-modal-button title="cancel" class-name="btn-success" :dismiss="false" type="submit">
                    <x-slot:title>
                        <span class="svg-icon svg-icon-1">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"><path d="M14.5 20.7259C14.6 21.2259 14.2 21.826 13.7 21.926C13.2 22.026 12.6 22.0259 12.1 22.0259C9.5 22.0259 6.9 21.0259 5 19.1259C1.4 15.5259 1.09998 9.72592 4.29998 5.82592L5.70001 7.22595C3.30001 10.3259 3.59999 14.8259 6.39999 17.7259C8.19999 19.5259 10.8 20.426 13.4 19.926C13.9 19.826 14.4 20.2259 14.5 20.7259ZM18.4 16.8259L19.8 18.2259C22.9 14.3259 22.7 8.52593 19 4.92593C16.7 2.62593 13.5 1.62594 10.3 2.12594C9.79998 2.22594 9.4 2.72595 9.5 3.22595C9.6 3.72595 10.1 4.12594 10.6 4.02594C13.1 3.62594 15.7 4.42595 17.6 6.22595C20.5 9.22595 20.7 13.7259 18.4 16.8259Z" fill="black"/><path opacity="0.3" d="M2 3.62592H7C7.6 3.62592 8 4.02592 8 4.62592V9.62589L2 3.62592ZM16 14.4259V19.4259C16 20.0259 16.4 20.4259 17 20.4259H22L16 14.4259Z" fill="black"/></svg>
                        </span>
                        {{__('Update')}}
                    </x-slot:title>
                </x-modal-button>
            </x-slot:buttons>
        </x-modal>
    </form>
</div>
<!--end::Col-->
