<!--begin::Administration configurations group links -->

<div class="menu-item here">
    <div class="menu-content pt-8 pb-2">
        <span class="menu-section text-muted text-uppercase fs-8 ls-1">{{__('Administration')}}</span>
    </div>
</div>
    <!--begin::Biosp Route Links-->
    <div data-kt-menu-trigger="click" class="menu-item menu-accordion @if (request()->routeIs('biosp.*')) show @endif">
        <span class="menu-link @if (request()->routeIs('biosp.*')) active @endif">
            <span class="menu-icon">
                <!--begin::Svg Icon -->
                <span class="svg-icon svg-icon-2">
                    @svg('fluentui-tree-deciduous-20')
                </span>
                <!--end::Svg Icon-->
            </span>
            <span class="menu-title">{{ __('Biosp\'s') }}</span>
            <span class="menu-arrow"></span>
        </span>

        <!--begin::All biosp Route Links-->
        <div class="menu-sub menu-sub-accordion menu-active-bg">
            <div class="menu-item">
                <a class="menu-link @if (request()->routeIs('biosp.index')) active @endif" href="{{ route('biosp.index') }}">
                    <span class="menu-bullet">
                        @svg('fluentui-tree-deciduous-20-o')
                    </span>
                    <span class="menu-title">{{ __(key:'All :resource',replace:[ 'resource' => Str::lower(__('Biosp\'s'))])}}</span>
                </a>
            </div>
        </div>
        <!--End::All biosp Route Link-->

        <!--begin::Create biosp Route Link-->
        <div class="menu-sub menu-sub-accordion menu-active-bg">
            <div class="menu-item">
                <a class="menu-link @if (request()->routeIs('biosp.create')) active @endif" href="{{ route('biosp.create') }}">
                    <span class="menu-bullet">

                        @svg('fluentui-tree-deciduous-20-o')
                    </span>
                    <span class="menu-title">{{ __(key:'Create :resource',replace:[ 'resource' => Str::lower(__('Biosp\'s'))]) }}</span>
                </a>
            </div>
        </div>
        <!--End::Create biosp Route Link-->

        @if (request()->routeIs('biosp.edit'))
            <!--begin::Edit province Route Link-->
            <div class="menu-sub menu-sub-accordion menu-active-bg">
                <div class="menu-item">
                    <a class="menu-link @if (request()->routeIs('biosp.edit')) active @endif" href="">
                        <span class="menu-bullet">
                            @svg('fluentui-tree-deciduous-20-o')
                        </span>
                        <span class="menu-title">{{ __(key:'Edit :resource',replace:[ 'resource' => Str::lower(__('Biosp\'s'))]) }}</span>
                    </a>
                </div>
            </div>
            <!--End::Edit biosp Route Link-->
        @endif

    </div>
    <!--End::Biosp Route Links-->

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
                        @svg('fluentui-person-board-24')
                    </span>
                    <span class="menu-title">{{ __(key:'All :resource',replace:[ 'resource' => Str::lower(__('Users')) ])}}</span>
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
                    <span class="menu-title">{{ __(key:'Create :resource',replace:[ 'resource' => Str::lower(__('User')) ]) }}</span>
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
                        <span class="menu-title">{{ __(key:'Edit :resource',replace:[ 'resource' => Str::lower(__('User')) ]) }}</span>
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
                        <span class="menu-title">{{ __(key:'View :resource',replace:[ 'resource' => Str::lower(__('User')) ]) }}</span>
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
                    <span class="menu-title">{{ __(key:'All :resource',replace:[ 'resource' => Str::lower(__('Countries')) ]) }}</span>
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
                    <span class="menu-title">{{ __(key:'Create :resource',replace:[ 'resource' => Str::lower(__('Country')) ])}}</span>
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
                        <span class="menu-title">{{ __(key:'Edit :resource',replace:[ 'resource' => Str::lower(__('Country'))]) }}</span>
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
                        <span class="menu-title">{{ __(key:'Viewing :resource',replace:[ 'resource' => Str::lower(__('Country'))])  }}</span>
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
                    <span class="menu-title">{{ __(key:':resource trash',replace:[ 'resource' => __('Countries')])  }}</span>
                </a>
            </div>
        </div>
        <!--End::Trash country Route Link-->

    </div>
    <!--End::Countries Route Links-->

    <!--begin::Provinces Route Links-->
    <div data-kt-menu-trigger="click" class="menu-item menu-accordion @if (request()->routeIs('province.*')) show @endif">
        <span class="menu-link @if (request()->routeIs('province.*')) active @endif">
            <span class="menu-icon">
                <!--begin::Svg Icon -->
                <span class="svg-icon svg-icon-2">
                    @svg('fluentui-city-16')
                </span>
                <!--end::Svg Icon-->
            </span>
            <span class="menu-title">{{ __('Provinces') }}</span>
            <span class="menu-arrow"></span>
        </span>

        <!--begin::All provinces Route Links-->
        <div class="menu-sub menu-sub-accordion menu-active-bg">
            <div class="menu-item">
                <a class="menu-link @if (request()->routeIs('province.index')) active @endif" href="{{ route('province.index') }}">
                    <span class="menu-bullet">
                        @svg('fluentui-city-16')
                    </span>
                    <span class="menu-title">{{ __(key:'All :resource',replace:[ 'resource' => Str::lower(__('Provinces'))])}}</span>
                </a>
            </div>
        </div>
        <!--End::All provinces Route Link-->

        <!--begin::Create province Route Link-->
        <div class="menu-sub menu-sub-accordion menu-active-bg">
            <div class="menu-item">
                <a class="menu-link @if (request()->routeIs('province.create')) active @endif" href="{{ route('province.create') }}">
                    <span class="menu-bullet">

                        @svg('fluentui-city-16')
                    </span>
                    <span class="menu-title">{{ __(key:'Create :resource',replace:[ 'resource' => Str::lower(__('Province'))]) }}</span>
                </a>
            </div>
        </div>
        <!--End::Create country Route Link-->

        @if (request()->routeIs('province.edit'))
            <!--begin::Edit province Route Link-->
            <div class="menu-sub menu-sub-accordion menu-active-bg">
                <div class="menu-item">
                    <a class="menu-link @if (request()->routeIs('province.edit')) active @endif" href="">
                        <span class="menu-bullet">
                            @svg('fluentui-city-16')
                        </span>
                        <span class="menu-title">{{ __(key:'Edit :resource',replace:[ 'resource' => Str::lower(__('Province'))]) }}</span>
                    </a>
                </div>
            </div>
            <!--End::Edit province Route Link-->
        @endif

    </div>
    <!--End::Provinces Route Links-->

    <!--begin::Neighborhood Route Links-->
    <div data-kt-menu-trigger="click" class="menu-item menu-accordion @if (request()->routeIs('neighborhood.*')) show @endif">
        <span class="menu-link @if (request()->routeIs('neighborhood.*')) active @endif">
            <span class="menu-icon">
                <!--begin::Svg Icon -->
                <span class="svg-icon svg-icon-2">
                    @svg('fluentui-align-bottom-48')
                </span>
                <!--end::Svg Icon-->
            </span>
            <span class="menu-title">{{ __('Neighborhoods') }}</span>
            <span class="menu-arrow"></span>
        </span>

        <!--begin::All neighborhoods Route Links-->
        <div class="menu-sub menu-sub-accordion menu-active-bg">
            <div class="menu-item">
                <a class="menu-link @if (request()->routeIs('neighborhood.index')) active @endif" href="{{ route('neighborhood.index') }}">
                    <span class="menu-bullet">
                        @svg('fluentui-align-bottom-32-o')
                    </span>
                    <span class="menu-title">{{ __(key:'All :resource',replace:[ 'resource' => Str::lower(__('Neighborhoods'))]) }}</span>
                </a>
            </div>
        </div>
        <!--End::All neighborhood Route Link-->

        <!--begin::Create neighborhood Route Link-->
        <div class="menu-sub menu-sub-accordion menu-active-bg">
            <div class="menu-item">
                <a class="menu-link @if (request()->routeIs('neighborhood.create')) active @endif" href="{{ route('neighborhood.create') }}">
                    <span class="menu-bullet">

                        @svg('fluentui-align-bottom-32-o')
                    </span>
                    <span class="menu-title">{{ __(key:'Create :resource',replace:[ 'resource' => Str::lower(__('Neighborhood'))])  }}</span>
                </a>
            </div>
        </div>
        <!--End::Create neighborhood Route Link-->

        @if (request()->routeIs('neighborhood.edit'))
            <!--begin::Edit neighborhood Route Link-->
            <div class="menu-sub menu-sub-accordion menu-active-bg">
                <div class="menu-item">
                    <a class="menu-link @if (request()->routeIs('neighborhood.edit')) active @endif" href="">
                        <span class="menu-bullet">
                            @svg('fluentui-align-bottom-32-o')
                        </span>
                        <span class="menu-title">{{ __(key:'Edit :resource',replace:[ 'resource' => Str::lower(__('Neighborhood'))])  }}</span>
                    </a>
                </div>
            </div>
            <!--End::Edit neighborhood Route Link-->
        @endif

    </div>
    <!--End::Neighborhood Route Links-->
<!--begin::Administration configurations group links -->

<!--begin::Biosp services group links -->
<div class="menu-item here">
    <div class="menu-content pt-8 pb-2">
        <span class="menu-section text-muted text-uppercase fs-8 ls-1">{{__('Biosp services')}}</span>
    </div>
</div>z
<!--end::Biosp services group links -->

<!--begin::Document type Route Links-->
<div data-kt-menu-trigger="click" class="menu-item menu-accordion @if (request()->routeIs('document_type.*')) show @endif">
        <span class="menu-link @if (request()->routeIs('document_type.*')) active @endif">
            <span class="menu-icon">
                <!--begin::Svg Icon -->
                <span class="svg-icon svg-icon-2">
                    @svg('fluentui-contact-card-20')
                </span>
                <!--end::Svg Icon-->
            </span>
            <span class="menu-title">{{ __('Document types') }}</span>
            <span class="menu-arrow"></span>
        </span>

    <!--begin::All document types Route Links-->
    <div class="menu-sub menu-sub-accordion menu-active-bg">
        <div class="menu-item">
            <a class="menu-link @if (request()->routeIs('document_type.index')) active @endif" href="{{ route('document_type.index') }}">
                    <span class="menu-bullet">
                       @svg('fluentui-contact-card-20')
                    </span>
                <span class="menu-title">{{ __(key:'All :resource',replace:[ 'resource' => Str::lower(__('Document types'))]) }}</span>
            </a>
        </div>
    </div>
    <!--End::All document types Route Link-->

    <!--begin::Create document type Route Link-->
    <div class="menu-sub menu-sub-accordion menu-active-bg">
        <div class="menu-item">
            <a class="menu-link @if (request()->routeIs('document_type.create')) active @endif" href="{{ route('document_type.create') }}">
                    <span class="menu-bullet">
                        @svg('fluentui-contact-card-20')
                    </span>
                <span class="menu-title">{{ __(key:'Create :resource',replace:[ 'resource' => Str::lower(__('Document type'))])  }}</span>
            </a>
        </div>
    </div>
    <!--End::Create document type Route Link-->

    @if (request()->routeIs('document_type.edit'))
        <!--begin::Edit document type Route Link-->
        <div class="menu-sub menu-sub-accordion menu-active-bg">
            <div class="menu-item">
                <a class="menu-link @if (request()->routeIs('document_type.edit')) active @endif" href="">
                        <span class="menu-bullet">
                           @svg('fluentui-contact-card-20')
                        </span>
                    <span class="menu-title">{{ __(key:'Edit :resource',replace:[ 'resource' => Str::lower(__('Document type'))])  }}</span>
                </a>
            </div>
        </div>
        <!--End::Edit document type Route Link-->
    @endif

</div>
<!--End::Document type Route Links-->



<!--begin::Forwarded service Route Links-->
<div data-kt-menu-trigger="click" class="menu-item menu-accordion @if (request()->routeIs('forwarded_service.*')) show @endif">
        <span class="menu-link @if (request()->routeIs('forwarded_service.*')) active @endif">
            <span class="menu-icon">
                <!--begin::Svg Icon -->
                <span class="svg-icon svg-icon-2">
                    @svg('fluentui-square-arrow-forward-16')
                </span>
                <!--end::Svg Icon-->
            </span>
            <span class="menu-title">{{ __('Forwarded service') }}</span>
            <span class="menu-arrow"></span>
        </span>

    <!--begin::All document types Route Links-->
    <div class="menu-sub menu-sub-accordion menu-active-bg">
        <div class="menu-item">
            <a class="menu-link @if (request()->routeIs('forwarded_service.index')) active @endif" href="{{ route('forwarded_service.index') }}">
                    <span class="menu-bullet">
                       @svg('fluentui-square-arrow-forward-16')
                    </span>
                <span class="menu-title">{{ __(key:'All :resource',replace:[ 'resource' => Str::lower(__('Forwarded service'))]) }}</span>
            </a>
        </div>
    </div>
    <!--End::All document types Route Link-->

    <!--begin::Create document type Route Link-->
    <div class="menu-sub menu-sub-accordion menu-active-bg">
        <div class="menu-item">
            <a class="menu-link @if (request()->routeIs('forwarded_service.create')) active @endif" href="{{ route('forwarded_service.create') }}">
                    <span class="menu-bullet">
                        @svg('fluentui-square-arrow-forward-16')
                    </span>
                <span class="menu-title">{{ __(key:'Create :resource',replace:[ 'resource' => Str::lower(__('Forwarded service'))])  }}</span>
            </a>
        </div>
    </div>
    <!--End::Create document type Route Link-->

    @if (request()->routeIs('forwarded_service.edit'))
        <!--begin::Edit document type Route Link-->
        <div class="menu-sub menu-sub-accordion menu-active-bg">
            <div class="menu-item">
                <a class="menu-link @if (request()->routeIs('forwarded_service.edit')) active @endif" href="">
                        <span class="menu-bullet">
                           @svg('fluentui-square-arrow-forward-16')
                        </span>
                    <span class="menu-title">{{ __(key:'Edit :resource',replace:[ 'resource' => Str::lower(__('Forwarded service'))])  }}</span>
                </a>
            </div>
        </div>
        <!--End::Edit document type Route Link-->
    @endif

</div>
<!--End::Forwarded service Route Links-->
