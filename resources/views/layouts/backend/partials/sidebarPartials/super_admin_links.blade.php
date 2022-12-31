<!--begin::Users Route Links-->
<div data-kt-menu-trigger="click" class="menu-item menu-accordion @if (request()->routeIs('user.*')) show @endif">
    <span class="menu-link @if (request()->routeIs('user.*')) active @endif">
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

    @if (request()->routeIs('user.show'))
        <!--begin::View user Route Link-->
        <div class="menu-sub menu-sub-accordion menu-active-bg">
            <div class="menu-item">
                <a class="menu-link @if (request()->routeIs('user.show')) active @endif" href="">
                    <span class="menu-bullet">
                        @svg('fluentui-shield-person-20')
                    </span>
                    <span class="menu-title">{{ __('Viewing user') }}</span>
                </a>
            </div>
        </div>
        <!--End::View user Route Link-->
    @endif

</div>
<!--End::Users Route Links-->
