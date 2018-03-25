@extends("layout.page")
@section("title", $user->getAccount())
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
                                <img src="{{ asset($user->getProfileImage()) }}" alt="@{{ $user->getAccount() }}">
                            </div>
                        </div>
                        <div class="m-card-profile__details">
                            <span class="m-card-profile__name">{{ $user->getName() }}</span>
                            <a href="{{ url("https://steemit.com/@{$user->getAccount()}") }}" class="m-card-profile__email m-link">{{ '@'.$user->getAccount() }}</a>
                        </div>
                    </div>
                    <ul class="m-nav m-nav--hover-bg m-portlet-fit--sides">
                        <li class="m-nav__separator m-nav__separator--fit"></li>
                        <li class="m-nav__section m--hide">
                            <span class="m-nav__section-text">Section</span>
                        </li>
                        <li class="m-nav__item">
                            <a href="{{ url("https://steemit.com/@{$user->getAccount()}") }}" class="m-nav__link">
                                <i class="m-nav__link-icon fa fa-user"></i>
                                <span class="m-nav__link-text">Steemit Profile</span>
                            </a>
                        </li>
                        <li class="m-nav__item">
                            <a href="{{ url("https://steemit.com/@{$user->getAccount()}/followed") }}" class="m-nav__link m-tabs__item">
                                <i class="m-nav__link-icon fa fa-arrow-left"></i>
                                <span class="m-nav__link-text">Following</span>
                                <span class="m-nav__link-badge">
                                    <span class="m-badge m-badge--metal">{{ $follows['following_count'] }}</span>
                                </span>
                            </a>
                        </li>
                        <li class="m-nav__item">
                            <a href="{{ url("https://steemit.com/@{$user->getAccount()}/followers") }}" class="m-nav__link m-tabs__item">
                                <i class="m-nav__link-icon fa fa-arrow-right"></i>
                                <span class="m-nav__link-text">Followers</span>
                                <span class="m-nav__link-badge">
                                    <span class="m-badge m-badge--metal">{{ $follows['follower_count'] }}</span>
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
                                    <span class="m-widget1__desc">Contributor since {{ format_date($user->getCreatedAt(), 'M, y') }}</span>
                                </div>
                                <div class="col m--align-right">
                                    <span class="m-widget1__number m--font-success">{{ $contribution }}</span>
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
                                {{ author($user) }}
                            </h3>
                        </div>
                    </div>
                </div>
                <div class="m-portlet__body">
                    <nav aria-label="Search result pagination">
                        {{ $pagination->render('pagination::bootstrap-4') }}
                    </nav>

                    <div class="m-widget5">
                        @foreach($feed as $item)
                            <div class="m-widget5__item">
                                <div class="m-widget5__content">
                                    <h4 class="m-widget5__title">
                                        <a href="{{ url("listen/{$item->getId()}") }}" title="{{ $item->getName() }}" class="m-link">
                                            {{ $item->getName() }}
                                        </a>
                                    </h4>
                                    <span class="m-widget5__desc">
                                        <blockquote class="blockquote blockquote-reverse">
                                            <p class="mb-0"><i class="fa fa-book"></i> {{ $item->getBook()->getName() }}</p>
                                            <footer class="blockquote-footer">By
                                                <cite title="{{ $item->getBook()->getAuthor()->getName() }}">
                                                    <a href="{{ url("author/{$item->getBook()->getAuthor()->getId()}") }}" class="m-link">
                                                        {{ $item->getBook()->getAuthor()->getName() }}
                                                    </a>
                                                </cite>
                                                in
                                                <cite title="{{ $item->getBook()->getYear() }}">
                                                    {{ $item->getBook()->getYear() }}
                                                </cite>
                                            </footer>
                                        </blockquote>

                                        {{ str_limit($item->getBody(), 200, '...') }}
                                    </span>
                                    <div class="m-widget5__info">
                                        <span class="m-widget5__author">
                                            by
                                        </span>
                                        <span class="m-widget5__info-author-name">
                                            {{ $item->getUser()->getAccount() }}
                                        </span>
                                        <span class="m-widget5__info-label">
                                            on
                                        </span>
                                        <span class="m-widget5__info-date">
                                            {{ format_date($item->getCreatedAt()) }}
                                        </span>
                                    </div>
                                </div>
                                <div class="m-widget5__stats1 text-center pl-0">
                                    <a class="m-link" href="{{ url("book/{$item->getBook()->getId()}") }}">
                                        <span><i class="fa fa-3x fa-book"></i></span><br>
                                        <span>Book</span>
                                    </a>
                                </div>
                                <div class="m-widget5__stats2 text-center pl-0">
                                    <a class="m-link" href="{{ url("listen/{$item->getId()}") }}">
                                        <span><i class="fa fa-3x fa-play"></i></span><br>
                                        <span>Listen</span>
                                    </a>
                                </div>
                            </div>
                        @endforeach
                    </div>

                    <nav aria-label="Search result pagination">
                        {{ $pagination->render('pagination::bootstrap-4') }}
                    </nav>
                </div>
            </div>
        </div>
    </div>
@endsection