<!-- BEGIN: Topbar -->
<div id="m_header_topbar" class="m-topbar  m-stack m-stack--ver m-stack--general">
    <div class="m-stack__item m-topbar__nav-wrapper">
        <ul class="m-topbar__nav m-nav m-nav--inline">
            @if (!Auth::guest())
            <li class="
	m-nav__item m-nav__item--focus m-dropdown m-dropdown--large m-dropdown--arrow m-dropdown--align-center m-dropdown--mobile-full-width m-dropdown--skin-light	m-list-search m-list-search--skin-light"
                data-dropdown-toggle="click" data-dropdown-persistent="true" id="m_quicksearch"
                data-search-type="dropdown">
                <a href="#" class="m-nav__link m-dropdown__toggle">
                    <span class="m-nav__link-icon">
                        <span class="m-nav__link-icon-wrapper">
                            <i class="flaticon-search-1"></i>
                        </span>
                    </span>
                </a>
                <div class="m-dropdown__wrapper">
                    <span class="m-dropdown__arrow m-dropdown__arrow--center"></span>
                    <div class="m-dropdown__inner ">
                        <div class="m-dropdown__header">
                            <form class="m-list-search__form">
                                {{ csrf_field() }}
                                <div class="m-list-search__form-wrapper">
                                    <span class="m-list-search__form-input-wrapper">
                                        <input id="m_quicksearch_input" autocomplete="off" type="text" name="q"
                                               class="m-list-search__form-input" value="" placeholder="Search...">
                                    </span>
                                    <span class="m-list-search__form-icon-close" id="m_quicksearch_close">
                                        <i class="la la-remove"></i>
                                    </span>
                                </div>
                            </form>
                        </div>
                        <div class="m-dropdown__body">
                            <div class="m-dropdown__scrollable m-scrollable" data-max-height="300" data-mobile-max-height="200">
                                <div class="m-dropdown__content"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </li>
            <li class="d-none m-nav__item m-nav__item--danger m-dropdown m-dropdown--skin-light m-dropdown--large m-dropdown--arrow m-dropdown--align-right m-dropdown--align-push m-dropdown--mobile-full-width m-dropdown--skin-light"
                data-dropdown-toggle="click">
                <a href="#" class="m-nav__link m-dropdown__toggle">
                    <span class="m-nav__link-badge m-badge m-badge--dot m-badge--info m--hide"></span>
                    <span class="m-nav__link-icon">
                        <span class="m-nav__link-icon-wrapper">
                            <i class="flaticon-share"></i>
                        </span>
                    </span>
                </a>
                <div class="m-dropdown__wrapper">
                    <span class="m-dropdown__arrow m-dropdown__arrow--right m-dropdown__arrow--adjust"></span>
                    <div class="m-dropdown__inner">
                        <div class="m-dropdown__header m--align-center">
                            <span class="m-dropdown__header-title">
                                Quick Actions
                            </span>
                            <span class="m-dropdown__header-subtitle">
                                Shortcuts
                            </span>
                        </div>
                        <div class="m-dropdown__body m-dropdown__body--paddingless">
                            <div class="m-dropdown__content">
                                <div class="m-scrollable" data-scrollable="false" data-max-height="380"
                                     data-mobile-max-height="200">
                                    <div class="m-nav-grid m-nav-grid--skin-light">
                                        <div class="m-nav-grid__row">
                                            <a href="#" class="m-nav-grid__item">
                                                <i class="m-nav-grid__icon flaticon-file"></i>
                                                <span class="m-nav-grid__text">
                                                    Generate Report
                                                </span>
                                            </a>
                                            <a href="#" class="m-nav-grid__item">
                                                <i class="m-nav-grid__icon flaticon-time"></i>
                                                <span class="m-nav-grid__text">
                                                    Add New Event
                                                </span>
                                            </a>
                                        </div>
                                        <div class="m-nav-grid__row">
                                            <a href="#" class="m-nav-grid__item">
                                                <i class="m-nav-grid__icon flaticon-folder"></i>
                                                <span class="m-nav-grid__text">
                                                    Create New Task
                                                </span>
                                            </a>
                                            <a href="#" class="m-nav-grid__item">
                                                <i class="m-nav-grid__icon flaticon-clipboard"></i>
                                                <span class="m-nav-grid__text">
                                                    Completed Tasks
                                                </span>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </li>
            <li class="m-nav__item m-dropdown m-dropdown--medium m-dropdown--arrow  m-dropdown--align-right m-dropdown--mobile-full-width m-dropdown--skin-light" data-dropdown-toggle="click">
                <a href="#" class="m-nav__link m-dropdown__toggle">
                    <span class="m-topbar__username m--hidden-mobile">
                        {{ Auth::user()->getName() }}
                    </span>
                    <span class="m-topbar__userpic">
                        <img src="{{ asset(Auth::user()->getProfileImage()) }}" class="m--img-rounded m--marginless m--img-centered" alt="{{ Auth::user()->getName() }}"/>
                    </span>
                    <span class="m-nav__link-icon m-topbar__usericon  m--hide">
                        <span class="m-nav__link-icon-wrapper">
                            <i class="flaticon-user-ok"></i>
                        </span>
                    </span>
                </a>
                <div class="m-dropdown__wrapper">
                    <span class="m-dropdown__arrow m-dropdown__arrow--right m-dropdown__arrow--adjust"></span>
                    <div class="m-dropdown__inner">
                        <div class="m-dropdown__header m--align-center">
                            <div class="m-card-user m-card-user--skin-light">
                                <div class="m-card-user__pic">
                                    <img src="{{ asset(Auth::user()->getProfileImage()) }}" class="m--img-rounded m--marginless" alt="{{ Auth::user()->getName() }}"/>
                                </div>
                                <div class="m-card-user__details">
                                    <span class="m-card-user__name m--font-weight-500">
                                        {{ Auth::user()->getName() }}
                                    </span>
                                    <a href="{{ url("https://steemit.com/@".Auth::user()->getAccount()) }}" class="m-card-user__email m--font-weight-300 m-link">
                                        {{ Auth::user()->getAccount() }}
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="m-dropdown__body">
                            <div class="m-dropdown__content">
                                <ul class="m-nav m-nav--skin-light">
                                    <li class="m-nav__section m--hide">
                                        <span class="m-nav__section-text">
                                            Section
                                        </span>
                                    </li>
                                    <li class="m-nav__item">
                                        <a href="{{ url("/user/".Auth::user()->getAccount()) }}" class="m-nav__link">
                                            <i class="m-nav__link-icon fa fa-user"></i>
                                            <span class="m-nav__link-title">
                                                <span class="m-nav__link-wrap">
                                                    <span class="m-nav__link-text">
                                                        My Profile
                                                    </span>
                                                </span>
                                            </span>
                                        </a>
                                    </li>
                                    @if (Auth::user()->checkRole('moderator'))
                                    <li class="m-nav__item">
                                        <a href="{{ url("/moderator/") }}" class="m-nav__link">
                                            <i class="m-nav__link-icon fa fa-cog"></i>
                                            <span class="m-nav__link-text">
                                                Moderator
                                            </span>
                                        </a>
                                    </li>
                                    @endif
                                    <li class="m-nav__item">
                                        <a href="{{ url("https://steemit.com/@".Auth::user()->getAccount()."/settings") }}" class="m-nav__link">
                                            <i class="m-nav__link-icon fa fa-cog"></i>
                                            <span class="m-nav__link-text">
                                                Profile Settings
                                            </span>
                                        </a>
                                    </li>
                                    <li class="m-nav__separator m-nav__separator--fit"></li>
                                    <li class="m-nav__item">
                                        <a href="{{ url(config("steem.rules")) }}" class="m-nav__link">
                                            <i class="m-nav__link-icon fa fa-balance-scale"></i>
                                            <span class="m-nav__link-text">
                                                Rules
                                            </span>
                                        </a>
                                    </li>
                                    <li class="m-nav__item">
                                        <a href="{{ url(config("steem.how_to")) }}" class="m-nav__link">
                                            <i class="m-nav__link-icon fa fa-question-circle"></i>
                                            <span class="m-nav__link-text">
                                                How to Contribute?
                                            </span>
                                        </a>
                                    </li>
                                    <li class="m-nav__separator m-nav__separator--fit"></li>
                                    <li class="m-nav__item">
                                        <a href="{{ url("/logout") }}" class="btn m-btn--pill btn-secondary m-btn m-btn--custom m-btn--label-brand m-btn--bolder">
                                            Logout
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </li>
            @endif
            <li id="m_quick_sidebar_toggle" class="m-nav__item m-nav__item--info m-nav__item--qs invisible">
                <a href="#" class="m-nav__link m-dropdown__toggle">
                    <span class="m-nav__link-icon m-nav__link-icon-alt">
                        <span class="m-nav__link-icon-wrapper">
                            <i class="flaticon-grid-menu"></i>
                        </span>
                    </span>
                </a>
            </li>
        </ul>
    </div>
</div>
<!-- END: Topbar -->