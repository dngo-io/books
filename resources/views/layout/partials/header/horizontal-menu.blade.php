<!-- BEGIN: Horizontal Menu -->
<button class="m-aside-header-menu-mobile-close  m-aside-header-menu-mobile-close--skin-dark" id="m_aside_header_menu_mobile_close_btn">
    <i class="la la-close"></i>
</button>
<div id="m_header_menu" class="m-header-menu m-aside-header-menu-mobile m-aside-header-menu-mobile--offcanvas  m-header-menu--skin-light m-header-menu--submenu-skin-light m-aside-header-menu-mobile--skin-dark m-aside-header-menu-mobile--submenu-skin-dark"  >
    <ul class="m-menu__nav m-menu__nav--submenu-arrow ">
        <li class="m-menu__item m-menu__item--rel">
            <a  href="{{ url("/") }}" class="m-menu__link">
                <span class="m-menu__item-here"></span>
                <i class="m-menu__link-icon fa fa-home"></i>
                <span class="m-menu__link-text">
                    Home
                </span>
            </a>
        </li>
        <li class="m-menu__item m-menu__item--rel">
            <a  href="{{ url("/books") }}" class="m-menu__link">
                <span class="m-menu__item-here"></span>
                <i class="m-menu__link-icon fa fa-book"></i>
                <span class="m-menu__link-text">
                    Books
                </span>
            </a>
        </li>
        <li class="m-menu__item m-menu__item--rel">
            <a  href="{{ url("/contributors") }}" class="m-menu__link">
                <span class="m-menu__item-here"></span>
                <i class="m-menu__link-icon fa fa-user"></i>
                <span class="m-menu__link-text">
                    Contributors
                </span>
            </a>
        </li>
        @if (!Auth::guest())
        <li class="m-menu__item m-menu__item--rel">
            <a  href="{{ url("/audio/create") }}" class="m-menu__link">
                <span class="m-menu__item-here"></span>
                <i class="m-menu__link-icon fa fa-plus m--font-success"></i>
                <span class="m-menu__link-text m--font-success">
                    Contribute
                </span>
            </a>
        </li>
        @else
        <li class="m-menu__item  m-menu__item--submenu m-menu__item--rel" data-menu-submenu-toggle="click" aria-haspopup="true">
            <a href="#" class="m-menu__link m-menu__toggle">
                <span class="m-menu__item-here"></span>
                <i class="m-menu__link-icon fa fa-info-circle"></i>
                <span class="m-menu__link-text">Project</span>
                <i class="m-menu__hor-arrow la la-angle-down"></i>
                <i class="m-menu__ver-arrow la la-angle-right"></i>
            </a>
            <div class="m-menu__submenu m-menu__submenu--classic m-menu__submenu--left">
                <span class="m-menu__arrow m-menu__arrow--adjust"></span>
                <ul class="m-menu__subnav">
                    <li class="m-menu__item" aria-haspopup="true">
                        <a href="{{ asset("dngo-documents/dngo-and-dngo-books-whitepaper.pdf") }}" class="m-menu__link ">
                            <i class="m-menu__link-icon fa fa-file-o"></i>
                            <span class="m-menu__link-text">Whitepaper</span>
                        </a>
                    </li>
                    <li class="m-menu__item" aria-haspopup="true">
                        <a href="{{ url("/road-map") }}" class="m-menu__link ">
                            <i class="m-menu__link-icon fa fa-road"></i>
                            <span class="m-menu__link-title">
                                <span class="m-menu__link-wrap">
                                    <span class="m-menu__link-text">Road Map</span>
                                </span>
                            </span>
                        </a>
                    </li>
                    <li class="m-menu__item" data-redirect="true" aria-haspopup="true">
                        <a href="{{ url("/about") }}" class="m-menu__link ">
                            <i class="m-menu__link-icon fa fa-users"></i>
                            <span class="m-menu__link-text">About</span>
                        </a>
                    </li>
                </ul>
            </div>
        </li>
        <li class="m-menu__item" data-redirect="true" aria-haspopup="true">
            <a href="{{ url("/login") }}" class="m-menu__link">
                <span class="m-menu__item-here"></span>
                <i class="m-menu__link-icon fa fa-sign-in m--font-danger"></i>
                <span class="m-menu__link-text m--font-danger">Login</span>
            </a>
        @endif
    </ul>
</div>
<!-- END: Horizontal Menu -->