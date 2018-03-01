@extends("layout.page")
@section("title", "Profile")
@section("content")
    <div class="row">
        <div class="col-lg-4">
            <div class="m-portlet m-portlet--full-height">
                <div class="m-portlet__body">
                    <div class="m-card-profile">
                        <div class="m-card-profile__title m--hide">
                            Profile
                        </div>
                        <div class="m-card-profile__pic">
                            <div class="m-card-profile__pic-wrapper">
                                <img src="{{ asset("assets/app/media/img/users/user4.jpg") }}" alt=""/>
                            </div>
                        </div>
                        <div class="m-card-profile__details">
                            <span class="m-card-profile__name">Semih</span>
                            <a href="{{ url("https://steemit.com/@author") }}" class="m-card-profile__email m-link">@account</a>
                        </div>
                    </div>
                    <ul class="m-nav m-nav--hover-bg m-portlet-fit--sides">
                        <li class="m-nav__separator m-nav__separator--fit"></li>
                        <li class="m-nav__section m--hide">
                            <span class="m-nav__section-text">Section</span>
                        </li>
                        <li class="m-nav__item">
                            <a href="{{ url("https://steemit.com/@author") }}" class="m-nav__link">
                                <i class="m-nav__link-icon fa fa-user"></i>
                                <span class="m-nav__link-text">Steemit Profile</span>
                            </a>
                        </li>
                        <li class="m-nav__item">
                            <a href="{{ url("https://steemit.com/@author/followed") }}" class="m-nav__link m-tabs__item">
                                <i class="m-nav__link-icon fa fa-arrow-left"></i>
                                <span class="m-nav__link-text">Following</span>
                                <span class="m-nav__link-badge">
                                    <span class="m-badge m-badge--metal">12</span>
                                </span>
                            </a>
                        </li>
                        <li class="m-nav__item">
                            <a href="{{ url("https://steemit.com/@author/followers") }}" class="m-nav__link m-tabs__item">
                                <i class="m-nav__link-icon fa fa-arrow-right"></i>
                                <span class="m-nav__link-text">Followers</span>
                                <span class="m-nav__link-badge">
                                    <span class="m-badge m-badge--metal">23</span>
                                </span>
                            </a>
                        </li>
                    </ul>

                    <div class="m-portlet__body-separator"></div>

                    <div class="m-widget1 m-widget1--paddingless">
                        <div class="m-widget1__item">
                            <div class="row m-row--no-padding align-items-center">
                                <div class="col">
                                    <h3 class="m-widget1__title">Contributions</h3>
                                    <span class="m-widget1__desc">Contributor since Feb, 18</span>
                                </div>
                                <div class="col m--align-right">
                                    <span class="m-widget1__number m--font-brand">33</span>
                                </div>
                            </div>
                        </div>
                        <div class="m-widget1__item">
                            <div class="row m-row--no-padding align-items-center">
                                <div class="col">
                                    <h3 class="m-widget1__title">Rewards</h3>
                                    <span class="m-widget1__desc">Current Price 4123 USD</span>
                                </div>
                                <div class="col m--align-right">
                                    <span class="m-widget1__number m--font-success">842 SBD</span>
                                </div>
                            </div>
                        </div>
                        <div class="m-widget1__item">
                            <div class="row m-row--no-padding align-items-center">
                                <div class="col">
                                    <h3 class="m-widget1__title">Voting Power</h3>
                                    <span class="m-widget1__desc">Current Price 4123 USD</span>
                                </div>
                                <div class="col m--align-right">
                                    <span class="m-widget1__number m--font-accent">98%</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-8">
            <div class="m-portlet m-portlet--full-height">
                <div class="m-portlet__head">
                    <div class="m-portlet__head-caption">
                        <div class="m-portlet__head-title">
                            <h3 class="m-portlet__head-text">
                                @author
                            </h3>
                        </div>
                    </div>
                </div>
                <div class="m-portlet__body">
                    <div class="m-widget5">
                        <div class="m-widget5__item">
                            <div class="m-widget5__pic">
                                <img class="m-widget7__img" src="./assets/app/media/img//products/product6.jpg" alt="">
                            </div>
                            <div class="m-widget5__content">
                                <h4 class="m-widget5__title">
                                    Great Logo Designn
                                </h4>
                                <span class="m-widget5__desc">
                                    Make Metronic Great  Again.Lorem Ipsum Amet
                                </span>
                                <div class="m-widget5__info">
                                    <span class="m-widget5__author">
                                    Author:
                                    </span>
                                    <span class="m-widget5__info-label">
                                        author:
                                    </span>
                                    <span class="m-widget5__info-author-name">
                                        Fly themes
                                    </span>
                                    <span class="m-widget5__info-label">
                                        Released:
                                    </span>
                                    <span class="m-widget5__info-date m--font-info">
                                        23.08.17
                                    </span>
                                </div>
                            </div>
                            <div class="m-widget5__stats1">
                                <span class="m-widget5__number">19,200</span><br>
                                <span class="m-widget5__sales">sales</span>
                            </div>
                            <div class="m-widget5__stats2">
                                <span class="m-widget5__number">1046</span><br>
                                <span class="m-widget5__votes">votes</span>
                            </div>
                        </div>
                        <div class="m-widget5__item">
                            <div class="m-widget5__pic">
                                <img class="m-widget7__img" src="./assets/app/media/img//products/product10.jpg" alt="">
                            </div>
                            <div class="m-widget5__content">
                                <h4 class="m-widget5__title">
                                    Branding Mockup
                                </h4>
                                <span class="m-widget5__desc">
                                    Make Metronic Great  Again.Lorem Ipsum Amet
                                </span>
                                <div class="m-widget5__info">
                                    <span class="m-widget5__author">
                                        Author:
                                    </span>
                                    <span class="m-widget5__info-author m--font-info">
                                        Fly themes
                                    </span>
                                    <span class="m-widget5__info-label">
                                        Released:
                                    </span>
                                    <span class="m-widget5__info-date m--font-info">
                                        23.08.17
                                    </span>
                                </div>
                            </div>
                            <div class="m-widget5__stats1">
                                <span class="m-widget5__number">24,583</span><br>
                                <span class="m-widget5__sales">sales</span>
                            </div>
                            <div class="m-widget5__stats2">
                                <span class="m-widget5__number">3809</span><br>
                                <span class="m-widget5__votes">votes</span>
                            </div>
                        </div>
                        <div class="m-widget5__item">
                            <div class="m-widget5__pic">
                                <img class="m-widget7__img" src="./assets/app/media/img//products/product11.jpg" alt="">
                            </div>
                            <div class="m-widget5__content">
                                <h4 class="m-widget5__title">
                                    Awesome Mobile App
                                </h4>
                                <span class="m-widget5__desc">
                                    Make Metronic Great  Again.Lorem Ipsum Amet
                                </span>
                                <div class="m-widget5__info">
                                    <span class="m-widget5__author">
                                        Author:
                                    </span>
                                    <span class="m-widget5__info-author m--font-info">
                                        Fly themes
                                    </span>
                                    <span class="m-widget5__info-label">
                                        Released:
                                    </span>
                                    <span class="m-widget5__info-date m--font-info">
                                        23.08.17
                                    </span>
                                </div>
                            </div>
                            <div class="m-widget5__stats1">
                                <span class="m-widget5__number">10,054</span><br>
                                <span class="m-widget5__sales">sales</span>
                            </div>
                            <div class="m-widget5__stats2">
                                <span class="m-widget5__number">1103</span><br>
                                <span class="m-widget5__votes">votes</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection