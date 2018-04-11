@extends("layout.page")
@section("title", $user->getAccount())
@section("content")
    <div class="row">
        <div class="col-lg-4">
            @include("layout.partials.profile.user-bar")
        </div>
        <div class="col-lg-8">
            <div class="m-portlet m-portlet--full-height">
                <div class="m-portlet__head">
                    <div class="m-portlet__head-caption">
                        <div class="m-portlet__head-title">
                            <h3 class="m-portlet__head-text">
                                {{ author($user_bar['user']) }}
                            </h3>
                        </div>
                    </div>
                </div>
                <div class="m-portlet__body">
                    @if($partial == 'feed')
                        @include("layout.partials.profile.feed")
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