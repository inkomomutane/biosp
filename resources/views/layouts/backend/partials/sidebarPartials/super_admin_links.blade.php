<!--begin::Dashboard Route Link-->
<div class="menu-item">
    <a class="menu-link @if (request()->routeIs('dashboard')) active @endif" href="{{ route('dashboard') }}">
        <span class="menu-icon">
            <!--begin::Svg Icon | path: icons/duotune/general/gen014.svg-->
            <span class="svg-icon svg-icon-2">
                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path
                        d="M3 2H10C10.6 2 11 2.4 11 3V10C11 10.6 10.6 11 10 11H3C2.4 11 2 10.6 2 10V3C2 2.4 2.4 2 3 2Z"
                        fill="currentColor" />
                    <path opacity="0.3"
                        d="M14 2H21C21.6 2 22 2.4 22 3V10C22 10.6 21.6 11 21 11H14C13.4 11 13 10.6 13 10V3C13 2.4 13.4 2 14 2Z"
                        fill="currentColor" />
                    <path opacity="0.3"
                        d="M3 13H10C10.6 13 11 13.4 11 14V21C11 21.6 10.6 22 10 22H3C2.4 22 2 21.6 2 21V14C2 13.4 2.4 13 3 13Z"
                        fill="currentColor" />
                    <path opacity="0.3"
                        d="M14 13H21C21.6 13 22 13.4 22 14V21C22 21.6 21.6 22 21 22H14C13.4 22 13 21.6 13 21V14C13 13.4 13.4 13 14 13Z"
                        fill="currentColor" />
                </svg>
            </span>
            <!--end::Svg Icon-->
        </span>
        <span class="menu-title">{{ __('Dashboard') }}</span>
    </a>
</div>
<!--End::Dashboard Route Link-->

<!--begin::Users Route Links-->
<div data-kt-menu-trigger="click" class="menu-item menu-accordion @if (request()->routeIs('user.index') || request()->routeIs('user.create')) show @endif">
    <span class="menu-link @if (request()->routeIs('user.index') || request()->routeIs('user.create')) active @endif">
        <span class="menu-icon">
            <!--begin::Svg Icon | path: icons/duotune/general/gen022.svg-->
            <span class="svg-icon svg-icon-2">
                @svg('fluentui-person-board-24')
            </span>
            <!--end::Svg Icon-->
        </span>
        <span class="menu-title">{{ __('Users') }}</span>
        <span class="menu-arrow"></span>
    </span>

    <!--begin::All users Route Links-->
    <div class="menu-sub menu-sub-accordion menu-active-bg">
        <div class="menu-item">
            <a class="menu-link @if (request()->routeIs('user.index')) active @endif" href="{{ route('user.index') }}">
                <span class="menu-bullet">
                    {{-- <span class="bullet bullet-dot"></span> --}}
                    @svg('fluentui-person-board-24')
                </span>
                <span class="menu-title">{{ __('All users') }}</span>
            </a>
        </div>
    </div>
    <!--End::All user Route Link-->

    <!--begin::Create user Route Link-->
    <div class="menu-sub menu-sub-accordion menu-active-bg">
        <div class="menu-item">
            <a class="menu-link @if (request()->routeIs('user.create')) active @endif" href="{{ route('user.create') }}">
                <span class="menu-bullet">

                    @svg('fluentui-person-add-28')
                </span>
                <span class="menu-title">{{ __('Create user') }}</span>
            </a>
        </div>
    </div>
    <!--End::Create user Route Link-->

    @if (request()->routeIs('user.edit'))
        <!--begin::Edit user Route Link-->
        <div class="menu-sub menu-sub-accordion menu-active-bg">
            <div class="menu-item">
                <a class="menu-link @if (request()->routeIs('user.edit')) active @endif" href="">
                    <span class="menu-bullet">
                        @svg('fluentui-person-edit-20')
                    </span>
                    <span class="menu-title">{{ __('Edit user') }}</span>
                </a>
            </div>
        </div>
        <!--End::Edit user Route Link-->
    @endif

</div>
<!--End::Users Route Links-->