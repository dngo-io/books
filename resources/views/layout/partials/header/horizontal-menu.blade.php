<!-- BEGIN: Horizontal Menu -->
<button class="m-aside-header-menu-mobile-close  m-aside-header-menu-mobile-close--skin-dark " id="m_aside_header_menu_mobile_close_btn">
    <i class="la la-close"></i>
</button>
<div id="m_header_menu" class="m-header-menu m-aside-header-menu-mobile m-aside-header-menu-mobile--offcanvas  m-header-menu--skin-light m-header-menu--submenu-skin-light m-aside-header-menu-mobile--skin-dark m-aside-header-menu-mobile--submenu-skin-dark "  >
    <ul class="m-menu__nav m-menu__nav--submenu-arrow ">
        <li class="m-menu__item m-menu__item--rel">
            <a  href="{{ url("/") }}" class="m-menu__link">
                <span class="m-menu__item-here"></span>
                <span class="m-menu__link-text">
                    Home
                </span>
            </a>
        </li>
        <li class="m-menu__item m-menu__item--rel">
            <a  href="{{ url("/books") }}" class="m-menu__link">
                <span class="m-menu__item-here"></span>
                <span class="m-menu__link-text">
                    Books
                </span>
            </a>
        </li>
        @if (!Auth::guest())
        <li class="m-menu__item m-menu__item--rel">
            <a  href="{{ url("/post") }}" class="m-menu__link">
                <span class="m-menu__item-here"></span>
                <span class="m-menu__link-text m--font-success">
                    Contribute
                </span>
            </a>
        </li>
        @else
        <li class="m-menu__item m-menu__item--rel">
            <a  href="{{ url("/road-map") }}" class="m-menu__link">
                <span class="m-menu__item-here"></span>
                <span class="m-menu__link-text">
                Road Map
            </span>
            </a>
        </li>
        <li class="m-menu__item m-menu__item--rel">
            <a  href="{{ url("/") }}" class="m-menu__link">
                <span class="m-menu__item-here"></span>
                <span class="m-menu__link-text">
                Whitepaper
            </span>
            </a>
        </li>
        <li class="m-menu__item m-menu__item--rel">
            <a  href="{{ url("/login") }}" class="m-menu__link">
                <span class="m-menu__item-here"></span>
                <span class="m-menu__link-text m--font-danger">
                    Login
                </span>
            </a>
        </li>
        @endif
    </ul>
</div>
<!-- END: Horizontal Menu -->