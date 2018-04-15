@extends("layout.page")
@section("title", $title)
@section("content")
    <div class="row">
        <div class="col-lg-4">
            @include("layout.partials.profile.user-bar")
        </div>
        <div class="col-lg-8">
            <div class="m-portlet m-portlet--tabs m-portlet--full-height">
                <div class="m-portlet__head">
                    <div class="m-portlet__head-caption">
                        <div class="m-portlet__head-title">
                            <h3 class="m-portlet__head-text">
                                {{ author($user_bar['user']) }}
                            </h3>
                        </div>
                    </div>
                    <div class="m-portlet__head-tools">
                        <ul class="nav nav-tabs m-tabs m-tabs-line m-tabs-line--right">
                            <li class="nav-item m-tabs__item">
                                <a class="nav-link m-tabs__link" href="{{ url("/user/{$user->getAccount()}") }}">
                                    <i class="fa fa-list"></i>
                                    Feed
                                </a>
                            </li>
                            <li class="nav-item m-tabs__item">
                                <a class="nav-link m-tabs__link" href="{{ url("/user/{$user->getAccount()}/pending-approval") }}">
                                    <i class="fa fa-clock-o"></i>
                                    Pending
                                </a>
                            </li>
                            <li class="nav-item m-tabs__item">
                                <a class="nav-link m-tabs__link" href="{{ url("/user/{$user->getAccount()}/rejected") }}">
                                    <i class="fa fa-times"></i>
                                    Rejected
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="m-portlet__body">
                    @if($partial == 'feed')
                        @include("layout.partials.profile.feed")
                    @elseif($partial == 'pending-approval')
                        @include("layout.partials.profile.pending-approval")
                    @elseif($partial == 'rejected')
                        @include("layout.partials.profile.rejected")
                    @elseif($partial == 'followers')
                        @include("layout.partials.profile.followers")
                    @elseif($partial == 'following')
                        @include("layout.partials.profile.following")
                    @endif
                </div>
            </div>
        </div>
    </div>
@endsection