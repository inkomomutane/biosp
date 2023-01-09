<div id="kt_header" style="" class="header align-items-stretch">



    <!--begin::Container-->
    <div class="container-fluid d-flex align-items-stretch justify-content-between shadow-sm">


        <!--begin::Aside mobile toggle-->
        <div class="d-flex align-items-center d-lg-none ms-n2 me-2" title="Show aside menu">
            <div class="btn btn-icon btn-active-light-primary w-30px h-30px w-md-40px h-md-40px"
                id="kt_aside_mobile_toggle">
                <!--begin::Svg Icon | path: icons/duotune/abstract/abs015.svg-->
                <span class="svg-icon svg-icon-1">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                        fill="none">
                        <path d="M21 7H3C2.4 7 2 6.6 2 6V4C2 3.4 2.4 3 3 3H21C21.6 3 22 3.4 22 4V6C22 6.6 21.6 7 21 7Z"
                            fill="black" />
                        <path opacity="0.3"
                            d="M21 14H3C2.4 14 2 13.6 2 13V11C2 10.4 2.4 10 3 10H21C21.6 10 22 10.4 22 11V13C22 13.6 21.6 14 21 14ZM22 20V18C22 17.4 21.6 17 21 17H3C2.4 17 2 17.4 2 18V20C2 20.6 2.4 21 3 21H21C21.6 21 22 20.6 22 20Z"
                            fill="black" />
                    </svg>
                </span>
                <!--end::Svg Icon-->
            </div>
        </div>
        <!--end::Aside mobile toggle-->


        <div class="d-flex align-items-center flex-grow-1 flex-lg-grow-0">
            <a href="{{ route('welcome') }}" class="d-lg-none">
                <img src="" class="resource_image h-30px" data-image="logo/logo.svg">
            </a>
        </div>

        <!--begin::Wrapper-->
        <div class="d-flex align-items-stretch justify-content-between flex-lg-grow-1">
            <!--begin::Navbar-->
            <div class="d-flex align-items-stretch" id="kt_header_nav">
                <!--begin::Menu wrapper-->
                <div class="header-menu align-items-stretch" data-kt-drawer="true" data-kt-drawer-name="header-menu"
                    data-kt-drawer-activate="{default: true, lg: false}" data-kt-drawer-overlay="true"
                    data-kt-drawer-width="{default:'200px', '300px': '250px'}" data-kt-drawer-direction="end"
                    data-kt-drawer-toggle="#kt_header_menu_mobile_toggle" data-kt-swapper="true"
                    data-kt-swapper-mode="prepend" data-kt-swapper-parent="{default: '#kt_body', lg: '#kt_header_nav'}">
                    <!--begin::Menu-->

                    <!--end::Menu-->
                </div>
                <!--end::Menu wrapper-->
            </div>
            <!--end::Navbar-->
            <!--begin::Toolbar wrapper-->
            <div class="d-flex align-items-stretch flex-shrink-0">
                <div class="d-flex align-items-center ms-1 ms-lg-3">
                      <span class="menu-link py-2 btn btn-active-light btn-active-color-primary btn-text-mutted" data-kt-menu-trigger="click"
                    data-kt-menu-placement="bottom-start">
                        <span class="menu-icon">
                           <span class="svg-icon-2">
                                @foreach ((config('app.available_locates')) as $key => $locate)
                                    @if($locate == app()->getLocale())
                                        @svg('flag-country-'. ($locate  == 'en'? 'us' : $locate ),'flag')
                                        @break
                                    @endif

                                @endforeach
                             </span>
                            <!--end::Svg Icon-->
                        </span>
                        <span class="menu-title fs-6"> {{__('Change language')}}</span>
                        <span class="menu-arrow"></span>
                    </span>

                    <!--begin::Menu-->
                    <div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-600 menu-state-bg-light-primary fw-bold fs-7 w-200px py-4"
                        data-kt-menu="true">
                        <!--begin::Menu item-->
                        <div class="menu-item px-3">
                            <a href="{{ route('change.language', ['lang'=> 'pt']) }}" class="menu-link @if (app()->getLocale() == 'pt') active @endif  px-3">
                                Português
                            </a>
                        </div>
                        <!--end::Menu item-->
                        <!--begin::Menu item-->
                        <div class="menu-item px-3">
                            <a href="{{ route('change.language', ['lang'=> 'fr']) }}" class="menu-link px-3  @if (app()->getLocale() == 'fr') active @endif ">
                                Français
                            </a>
                        </div>
                        <!--end::Menu item-->
                        <!--begin::Menu item-->
                        <div class="menu-item px-3 ">
                            <a href="{{ route('change.language', ['lang'=> 'en']) }}" class="menu-link px-3  @if (app()->getLocale() == 'en') active @endif">
                                English
                            </a>
                        </div>
                        <!--end::Menu item-->
                    </div>
                    <!--end::Menu-->

                </div>

                <div class="d-flex align-items-center ms-1 ms-lg-3">
                    <!--begin::Theme mode .docs-->
                    <span
                        class="btn btn-icon btn-icon-muted btn-active-light btn-active-color-primary w-30px h-30px w-md-40px h-md-40px"
                        onclick="document.querySelector('#dark_mode').submit()">
                        <!--begin::Svg Icon | path: assets/media/icons/duotune/arrows/arr084.svg-->
                        <span class="svg-icon svg-icon-muted svg-icon-2">
                            @if (Session::get('dark'))
                                <x-fluentui-weather-moon-28 />
                            @else
                                <x-fluentui-weather-sunny-28 />
                            @endif

                        </span>
                        <!--end::Svg Icon-->

                    </span>
                    <!--end::Theme mode .docs-->
                </div>


                <!--begin::User menu-->
                <div class="d-flex align-items-center ms-1 ms-lg-3" id="kt_header_user_menu_toggle">
                    <!--begin::Menu wrapper-->
                    <div class="cursor-pointer symbol symbol-30px symbol-md-40px" data-kt-menu-trigger="click"
                        data-kt-menu-attach="parent" data-kt-menu-placement="bottom-end">
                        <div class="symbol-label fs-2 fw-bold text-primary bg-soft-blue text-uppercase">
                            {{ auth()->user()->name[0] }}</div>
                    </div>
                    <!--begin::User account menu-->
                    <div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-800 menu-state-bg menu-state-primary fw-bold py-4 fs-6 w-auto"
                        data-kt-menu="true">
                        <!--begin::Menu item-->
                        <div class="menu-item px-3">
                            <div class="menu-content d-flex align-items-center px-3">
                                <!--begin::Avatar-->
                                <div class="symbol symbol-50px me-5">
                                    <div class="symbol-label fs-2 fw-bold text-primary bg-soft-blue text-uppercase">
                                        {{ auth()->user()->name[0] }}</div>
                                </div>
                                <!--end::Avatar-->
                                <!--begin::Username-->
                                <div class="d-flex flex-column">
                                    <div class="fw-bolder d-flex align-items-center fs-5">{{ auth()->user()->name }}
                                    </div>
                                    <span
                                        class="fw-bold text-muted text-hover-primary fs-7">{{ auth()->user()->email }}</span>
                                </div>
                                <!--end::Username-->
                            </div>
                        </div>
                        <!--end::Menu item-->
                        <!--begin::Menu separator-->
                        <div class="separator my-2"></div>
                        <!--end::Menu separator-->
                        <!--begin::Menu item-->
                        <div class="menu-item px-5">
                            <form action="{{ route('logout') }}" method="post" id="logout">@method('POST')@csrf
                            </form>
                            <span class="menu-link px-5"
                                onclick="document.querySelector('#logout').submit()">{{ __('Logout') }}</span>
                        </div>
                        <!--end::Menu item-->
                        <!--begin::Menu separator-->
                        <div class="separator my-2"></div>
                        <!--end::Menu separator-->
                        <!--begin::Menu item-->
                        <div class="menu-item px-5">
                            <div class="menu-content px-5">
                                <form action="{{ url('dark_mode') }}" method="post" id="dark_mode">
                                    @method('POST')@csrf</form>
                                <label
                                    class="form-check form-switch form-check-custom form-check-solid pulse pulse-success"
                                    for="kt_user_menu_dark_mode_toggle"
                                    onclick="document.querySelector('#dark_mode').submit()">
                                    <input class="form-check-input w-30px h-20px" type="checkbox" name="mode"
                                        id="kt_user_menu_dark_mode_toggle"
                                        @if (Session::get('dark')) checked @endif />
                                    <span class="pulse-ring ms-n1"></span>
                                    <span class="form-check-label text-gray-600 fs-7">{{ __('Dark Mode') }}</span>
                                </label>
                            </div>
                        </div>
                        <!--end::Menu item-->
                    </div>
                    <!--end::User account menu-->
                    <!--end::Menu wrapper-->
                </div>
                <!--end::User menu-->
            </div>
            <!--end::Toolbar wrapper-->
        </div>
        <!--end::Wrapper-->
    </div>
    <!--end::Container-->
</div>

{{-- file:///home/alex-mutane/Documents/Workspace/Web_dev/html/demo1/dist/index.html --}}
