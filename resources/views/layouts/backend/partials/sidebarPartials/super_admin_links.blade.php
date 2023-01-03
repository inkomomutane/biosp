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


<!--begin::Countries Route Links-->
<div data-kt-menu-trigger="click" class="menu-item menu-accordion @if (request()->routeIs('country.*')) show @endif">
    <span class="menu-link @if (request()->routeIs('country.*')) active @endif">
        <span class="menu-icon">
            <!--begin::Svg Icon | path: icons/duotune/general/gen022.svg-->
            <span class="svg-icon svg-icon-2">
                @svg('fluentui-flag-pride-16')
            </span>
            <!--end::Svg Icon-->
        </span>
        <span class="menu-title">{{ __('Countries') }}</span>
        <span class="menu-arrow"></span>
    </span>

    <!--begin::All country Route Links-->
    <div class="menu-sub menu-sub-accordion menu-active-bg">
        <div class="menu-item">
            <a class="menu-link @if (request()->routeIs('country.index')) active @endif" href="{{ route('country.index') }}">
                <span class="menu-bullet">
                    {{-- <span class="bullet bullet-dot"></span> --}}
                    @svg('fluentui-flag-pride-16')
                </span>
                <span class="menu-title">{{ __('All countries') }}</span>
            </a>
        </div>
    </div>
    <!--End::All country Route Link-->

    <!--begin::Create country Route Link-->
    <div class="menu-sub menu-sub-accordion menu-active-bg">
        <div class="menu-item">
            <a class="menu-link @if (request()->routeIs('country.create')) active @endif" href="{{ route('country.create') }}">
                <span class="menu-bullet">

                    @svg('fluentui-flag-16-o')
                </span>
                <span class="menu-title">{{ __('Create country') }}</span>
            </a>
        </div>
    </div>
    <!--End::Create country Route Link-->

    @if (request()->routeIs('country.edit'))
        <!--begin::Edit country Route Link-->
        <div class="menu-sub menu-sub-accordion menu-active-bg">
            <div class="menu-item">
                <a class="menu-link @if (request()->routeIs('country.edit')) active @endif" href="">
                    <span class="menu-bullet">
                        @svg('fluentui-flag-48')
                    </span>
                    <span class="menu-title">{{ __('Edit country') }}</span>
                </a>
            </div>
        </div>
        <!--End::Edit country Route Link-->
    @endif

    @if (request()->routeIs('country.show'))
        <!--begin::View country Route Link-->
        <div class="menu-sub menu-sub-accordion menu-active-bg">
            <div class="menu-item">
                <a class="menu-link @if (request()->routeIs('country.show')) active @endif" href="">
                    <span class="menu-bullet">
                        @svg('fluentui-flag-16-o')
                    </span>
                    <span class="menu-title">{{ __('Viewing country') }}</span>
                </a>
            </div>
        </div>
        <!--End::View country Route Link-->
    @endif

      <!--begin::Trash country Route Links-->
      <div class="menu-sub menu-sub-accordion menu-active-bg">
        <div class="menu-item">
            <a class="menu-link @if (request()->routeIs('country.trash')) active @endif" href="{{ route('country.trash') }}">
                <span class="menu-bullet">
                    {{-- <span class="bullet bullet-dot"></span> --}}
                    @svg('fluentui-flag-off-16')
                </span>
                <span class="menu-title">{{ __('Countries trash') }}</span>
            </a>
        </div>
    </div>
    <!--End::Trash country Route Link-->

</div>
<!--End::Countries Route Links-->
