<!-- BEGIN: Topbar -->
<div id="m_header_topbar" class="m-topbar  m-stack m-stack--ver m-stack--general">
    <div class="m-stack__item m-topbar__nav-wrapper">
        <ul class="m-topbar__nav m-nav m-nav--inline">
            @if (!Auth::guest())
            <li class="m-nav__item m-nav__item--focus m-dropdown m-dropdown--large m-dropdown--arrow m-dropdown--align-center m-dropdown--mobile-full-width m-dropdown--skin-light	m-list-search m-list-search--skin-light"
                data-dropdown-toggle="click" data-dropdown-persistent="true" id="topbar_quicksearch"
                data-search-type="dropdown">
                <a href="#" class="m-nav__link m-dropdown__toggle">
                    <span class="m-nav__link-icon">
                        <span class="m-nav__link-icon-wrapper">
                            <i class="fa fa-search"></i>
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
                                        <input id="topbar_quicksearch_input" autocomplete="off" type="text" name="name"
                                               class="m-list-search__form-input" value="" placeholder="Search...">
                                    </span>
                                    <span class="m-list-search__form-icon-close" id="topbar_quicksearch_close">
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
            <li class="m-nav__item m-nav__item--danger">
                <a href="{{ url("https://discord.gg/Hvb8vpq") }}" class="m-nav__link">
                    <span class="m-nav__link-badge m-badge m-badge--dot m-badge--info m--hide"></span>
                    <span class="m-nav__link-icon">
                    <span class="m-nav__link-icon-wrapper">
                        <i class="fa fa-comments"></i>
                    </span>
                </span>
                </a>
            </li>
            <li class="m-nav__item m-nav__item--danger m-dropdown m-dropdown--skin-light m-dropdown--large m-dropdown--arrow m-dropdown--align-right m-dropdown--align-push m-dropdown--mobile-full-width m-dropdown--skin-light"
                data-dropdown-toggle="click">
                <a href="#" class="m-nav__link m-dropdown__toggle">
                    <span class="m-nav__link-badge m-badge m-badge--dot m-badge--info m--hide"></span>
                    <span class="m-nav__link-icon"><span class="m-nav__link-icon-wrapper"><i class="fa fa-bolt"></i></span></span>
                </a>
                <div class="m-dropdown__wrapper">
                    <span class="m-dropdown__arrow m-dropdown__arrow--right m-dropdown__arrow--adjust"></span>
                    <div class="m-dropdown__inner">
                        <div class="m-dropdown__header m--align-center">
                            <span class="m-dropdown__header-title">Delegate Us!</span>
                            <span class="m-dropdown__header-subtitle">
                                Help us to serve better content.
                                <br>
                                <a href="{{ url("https://discord.gg/Hvb8vpq") }}" class="m-link">
                                    {{ config("app.name") }} @ Discord.
                                </a>
                            </span>
                        </div>
                        <div class="m-dropdown__body m-dropdown__body--paddingless">
                            <div class="m-dropdown__content">
                                <div class="m-scrollable" data-scrollable="false" data-max-height="380" data-mobile-max-height="200">
                                    <div class="m-nav-grid m-nav-grid--skin-light">
                                        <div class="m-nav-grid__row">
                                            <a href="https://steemconnect.com/sign/delegateVestingShares?delegator={{ Auth::user()->getAccount() }}&amp;delegatee={{ config("steem.bot") }}&amp;vesting_shares=50%20SP" class="m-nav-grid__item">
                                                <i class="m-nav-grid__icon fa fa-thermometer-1"></i>
                                                <span class="m-nav-grid__text m--font-dark">50 SP</span>
                                            </a>
                                            <a href="https://steemconnect.com/sign/delegateVestingShares?delegator={{ Auth::user()->getAccount() }}&amp;delegatee={{ config("steem.bot") }}&amp;vesting_shares=250%20SP" class="m-nav-grid__item">
                                                <i class="m-nav-grid__icon fa fa-thermometer-2"></i>
                                                <span class="m-nav-grid__text m--font-dark">250 SP</span>
                                            </a>
                                        </div>
                                        <div class="m-nav-grid__row">
                                            <a href="https://steemconnect.com/sign/delegateVestingShares?delegator={{ Auth::user()->getAccount() }}&amp;delegatee={{ config("steem.bot") }}&amp;vesting_shares=1000%20SP" class="m-nav-grid__item">
                                                <i class="m-nav-grid__icon fa fa-thermometer-3"></i>
                                                <span class="m-nav-grid__text m--font-dark">1000 SP</span>
                                            </a>
                                            <a href="https://steemconnect.com/sign/delegateVestingShares?delegator={{ Auth::user()->getAccount() }}&amp;delegatee={{ config("steem.bot") }}&amp;vesting_shares=5000%20SP" class="m-nav-grid__item">
                                                <i class="m-nav-grid__icon fa fa-thermometer-4"></i>
                                                <span class="m-nav-grid__text m--font-dark">5000 SP</span>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </li>
            @if ($moderation['is_mod'])
                @if ($moderation['pending'] > 0)
                <li class="m-nav__item m-nav__item--danger">
                    <a href="{{ url("/moderation") }}" class="m-nav__link">
                        <span class="m-nav__link-badge m-badge m-badge--dot m-badge--dot-small m-badge--danger m-animate-blink"></span>
                        <span class="m-nav__link-icon m-animate-shake">
                            <span class="m-nav__link-icon-wrapper">
                                <i class="fa fa-shield"></i>
                            </span>
                        </span>
                    </a>
                </li>
                @else
                <li class="m-nav__item m-nav__item--danger">
                    <a href="{{ url("/moderation") }}" class="m-nav__link">
                        <span class="m-nav__link-icon">
                            <span class="m-nav__link-icon-wrapper">
                                <i class="fa fa-shield"></i>
                            </span>
                        </span>
                    </a>
                </li>
                @endif
            @endif
            <li class="m-nav__item m-dropdown m-dropdown--medium m-dropdown--arrow  m-dropdown--align-right m-dropdown--mobile-full-width m-dropdown--skin-light" data-dropdown-toggle="click">
                <a href="#" class="m-nav__link m-dropdown__toggle">
                    <span class="m-topbar__username m--hidden-mobile">
                        {{ Auth::user()->getName() }}
                    </span>
                    <span class="m-topbar__userpic">
                        <img src="{{ get_steem_pp(Auth::user()->getProfileImage()) }}" class="m--img-rounded m--marginless m--img-centered" alt="{{ Auth::user()->getName() }}"/>
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
                                    <img src="{{ get_steem_pp(Auth::user()->getProfileImage()) }}" class="m--img-rounded m--marginless" alt="{{ Auth::user()->getName() }}"/>
                                </div>
                                <div class="m-card-user__details">
                                    <span class="m-card-user__name m--font-weight-500">
                                        {{ Auth::user()->getName() }}
                                    </span>
                                    <a href="{{ url("https://steemit.com/@".Auth::user()->getAccount()) }}" class="m-card-user__email m--font-weight-300 m-link">
                                        {{ author(Auth::user()) }}
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