<div class="media mt-3">
    <img src="{{ asset("assets/custom/img/profile-picture.jpg") }}" class="mr-3 m--img-rounded" width="40" alt="{{ $_reply['author'] }}">
    <div class="media-body">
        <h6 class="mt-0">
            {{ author($_reply) }}
            @if($_reply['author'] == $_reply['root_author'])
                @include("layout.partials.comment-op")
            @endif
        </h6>
        <div class="comment-body">{!! parse_md($_reply['body']) !!}</div>
        <p class="comment-body">
            <i class="fa fa-chevron-up m--font-success d-none"></i> {{ payout($_reply['pending_payout_value']) }}
            <a href="{{ url('https://steemit.com'.str_start($_reply['url'], '/')) }}" class="ml-5 m-link">Reply</a>
        </p>
        @foreach($_reply['replies'] as $_reply)
            @include('layout.partials.comments-sub', $_reply)
        @endforeach
    </div>
</div>