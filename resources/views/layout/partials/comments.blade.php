<div class="media">
    <img class="mr-3 m--img-rounded" src="{{ asset("assets/custom/img/profile-picture.jpg") }}" width="64" alt="{{ $reply['author'] }}">
    <div class="media-body">
        <h5 class="mt-0">{{ author($reply) }}</h5>
        {!! $reply['body'] !!}
        <p>
            <i class="fa fa-chevron-up d-none"></i> {{ payout($reply['pending_payout_value']) }}
            <a href="{{ url('https://steemit.com'.str_start($reply['url'], '/')) }}" class="ml-5 m-link">Reply</a>
        </p>
        @foreach($reply['replies'] as $_reply)
            @include('layout.partials.comments-sub', $_reply)
        @endforeach
    </div>
</div>