<!-- BEGIN: Header -->
<header class="m-grid__item m-header" data-minimize="minimize" data-minimize-mobile="minimize" data-minimize-offset="200" data-minimize-mobile-offset="200">
    <div class="m-container m-container--fluid m-container--full-height">
        <div class="m-stack m-stack--ver m-stack--desktop  m-header__wrapper">
            <!-- BEGIN: Brand -->
            <div class="m-stack__item m-brand m-brand--mobile">
                <div class="m-stack m-stack--ver m-stack--general">
                    <div class="m-stack__item m-stack__item--middle m-brand__logo">
                        <a href="{{ url("/") }}" class="m-brand__logo-wrapper">
                            <img alt="{{ config("app.name") }} Logo" src="{{ asset("assets/demo/demo9/media/img/logo/logo.png") }}"/>
                        </a>
                    </div>
                    <div class="m-stack__item m-stack__item--middle m-brand__tools">
                        <!-- BEGIN: Responsive Header Menu Toggler -->
                        <a id="m_aside_header_menu_mobile_toggle" href="javascript:;" class="m-brand__icon m-brand__toggler">
                            <span></span>
                        </a>
                        <!-- END -->
                        @if (!Auth::guest())
                        <!-- BEGIN: Topbar Toggler -->
                        <a id="m_aside_header_topbar_mobile_toggle" href="javascript:;" class="m-brand__icon">
                            <i class="flaticon-more"></i>
                        </a>
                        <!-- BEGIN: Topbar Toggler -->
                        @endif
                    </div>
                </div>
            </div>
            <!-- END: Brand -->
            <div class="m-stack__item m-stack__item--middle m-stack__item--left m-header-head" id="m_header_nav">
                <div class="m-stack m-stack--ver m-stack--desktop">
                    <div class="m-stack__item m-stack__item--middle m-stack__item--fit">

                    </div>
                    <div class="m-stack__item m-stack__item--fluid">
                        @include("layout.partials.header.horizontal-menu")
                    </div>
                </div>
            </div>
            <div class="m-stack__item m-stack__item--middle m-stack__item--center">
                <!-- BEGIN: Brand -->
                <a href="{{ url("/") }}" class="m-brand m-brand--desktop">
                    <img alt="{{ config("app.name") }} Logo" src="{{ asset("assets/demo/demo9/media/img/logo/logo.png") }}"/>
                </a>
                <!-- END: Brand -->
            </div>
            <div class="m-stack__item m-stack__item--right">
                @include("layout.partials.header.topbar")
            </div>
        </div>
    </div>
</header>
<!-- END: Header -->