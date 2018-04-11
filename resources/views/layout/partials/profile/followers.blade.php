<div class="m-widget5">
    <div class="m-widget4">
        @foreach($steem_data as $item)
            <div class="m-widget4__item">
                <div class="m-widget4__img m-widget4__img--pic">
                    <img src="{{ asset("assets/custom/img/profile-picture.jpg") }}" alt="{{ $item['follower'] }}">
                </div>
                <div class="m-widget4__info">
                    <span class="m-widget4__title">
                        {{ $item['follower'] }}
                    </span>
                </div>
                <div class="m-widget4__ext">
                    <a href="{{ url("https://steemit.com/@{$item['follower']}") }}" class="m-btn m-btn--pill btn btn-sm btn-success">Steemit</a>
                </div>
            </div>
        @endforeach
        @if($user_bar['follows']['follower_count'] > 50)
            <div class="text-center">
                <a href="{{ url("https://steemit.com/".author($user_bar['user'], false)."/followers") }}" class="btn btn-success">
                    View all on Steemit
                </a>
            </div>
        @elseif($user_bar['follows']['follower_count'] === 0)
            <p class="text-center">No user found</p>
        @endif
    </div>
</div>