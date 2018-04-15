<div class="m-portlet m-portlet--full-height">
    <div class="m-portlet__body">
        <div class="m-card-profile">
            <div class="m-card-profile__title m--hide">
                Profile
            </div>
            <div class="m-card-profile__pic">
                <div class="m-card-profile__pic-wrapper">
                    <img src="{{ get_steem_pp($user->getProfileImage())}}" alt="{{ author($user, false) }}">
                </div>
            </div>
            <div class="m-card-profile__details">
                <span class="m-card-profile__name">{{ $user->getName() }}</span>
                <a href="{{ url("https://steemit.com/@{$user->getAccount()}") }}" class="m-card-profile__email m-link">{{ author($user_bar['user']) }}</a>
            </div>
            <br>
            <div class="text-center">
                {{ voting_power($user_bar['user']) }}%
                <div class="progress m-progress--sm">
                    <div class="progress-bar m--bg-accent" role="progressbar" style="width: {{ voting_power($user_bar['user']) }}%;" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
                </div>
            </div>
        </div>
        <ul class="m-nav m-nav--hover-bg m-portlet-fit--sides">
            <li class="m-nav__separator m-nav__separator--fit"></li>
            <li class="m-nav__section m--hide">
                <span class="m-nav__section-text">Section</span>
            </li>
            <li class="m-nav__item">
                <a href="{{ url("user/{$user->getAccount()}") }}" class="m-nav__link">
                    <i class="m-nav__link-icon fa fa-user"></i>
                    <span class="m-nav__link-text">Feed</span>
                </a>
            </li>
            <li class="m-nav__item">
                <a href="{{ url("https://steemit.com/@{$user->getAccount()}") }}" class="m-nav__link">
                    <i class="m-nav__link-icon fa fa-user"></i>
                    <span class="m-nav__link-text">Steemit Profile</span>
                </a>
            </li>
            <li class="m-nav__item">
                <a href="{{ url("user/{$user->getAccount()}/following") }}" class="m-nav__link m-tabs__item">
                    <i class="m-nav__link-icon fa fa-arrow-left"></i>
                    <span class="m-nav__link-text">Following</span>
                    <span class="m-nav__link-badge">
                        <span class="m-badge m-badge--metal">{{ $user_bar['follows']['following_count'] }}</span>
                    </span>
                </a>
            </li>
            <li class="m-nav__item">
                <a href="{{ url("user/{$user->getAccount()}/followers") }}" class="m-nav__link m-tabs__item">
                    <i class="m-nav__link-icon fa fa-arrow-right"></i>
                    <span class="m-nav__link-text">Followers</span>
                    <span class="m-nav__link-badge">
                        <span class="m-badge m-badge--metal">{{ $user_bar['follows']['follower_count'] }}</span>
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