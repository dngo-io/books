<!-- BEGIN: Horizontal Menu -->
<button class="m-aside-header-menu-mobile-close  m-aside-header-menu-mobile-close--skin-dark" id="m_aside_header_menu_mobile_close_btn">
    <i class="la la-close"></i>
</button>
<div id="m_header_menu" class="m-header-menu m-aside-header-menu-mobile m-aside-header-menu-mobile--offcanvas  m-header-menu--skin-light m-header-menu--submenu-skin-light m-aside-header-menu-mobile--skin-dark m-aside-header-menu-mobile--submenu-skin-dark"  >
    <ul class="m-menu__nav m-menu__nav--submenu-arrow ">
        @if (!Auth::guest())
            @include("layout.partials.header.horizontal-menu.user-menu")
        @else
            @include("layout.partials.header.horizontal-menu.guest-menu")
        @endif
    </ul>
</div>
<!-- END: Horizontal Menu -->