<!-- BEGIN: Header -->
<header class="m-grid__item    m-header "  data-minimize="minimize" data-minimize-mobile="minimize" data-minimize-offset="200" data-minimize-mobile-offset="200" >
    <div class="m-container m-container--fluid m-container--full-height">
        <div class="m-stack m-stack--ver m-stack--desktop  m-header__wrapper">
            @include("partials.header.brand-mobile")
            <div class="m-stack__item m-stack__item--middle m-stack__item--left m-header-head" id="m_header_nav">
                @include("partials.header.header-hor-menu")
            </div>
            <div class="m-stack__item m-stack__item--middle m-stack__item--center">
                @include("partials.header.brand-desktop")
            </div>
            <div class="m-stack__item m-stack__item--right">
                @include("partials.header.header-top-bar")
            </div>
        </div>
    </div>
</header>
<!-- END: Header -->