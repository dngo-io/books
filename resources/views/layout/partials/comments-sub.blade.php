<div class="media mt-3">
    <a class="pr-3" href="#">
        <img src="{{ asset("assets/custom/img/profile-picture.jpg") }}" class="m--img-rounded" width="64" alt="{{ $_reply['author'] }}">
    </a>
    <div class="media-body">
        <h5 class="mt-0">{{ author($_reply['author']) }} ({{ reputation($reply['author_reputation']) }})</h5>
        {!! $_reply['body'] !!}
        <p>
            <i class="fa fa-chevron-up m--font-success"></i> {{ payout($reply['pending_payout_value']) }}
            <a href="#" class="ml-5 m-link">Reply</a>
        </p>
        @foreach($_reply['replies'] as $_reply)
            @include('layout.partials.comments-sub', $_reply)
        @endforeach
    </div>
</div>