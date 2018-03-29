@php /** @var \App\Entities\BookAudio $audio */ @endphp
@extends("layout.page")
@section("title", $audio->getName().' - Chapter #'.$audio->getChapter().' by '.$audio->getBook()->getAuthor()->getName())
@section("script")
    @if ($is_playable)
        Amplitude.init({
            "songs": [
                {
                    "name": "{{ $audio->getName() }}",
                    "artist": "{{ $audio->getBook()->getAuthor()->getName()}}",
                    "album": "{{ $audio->getBook()->getName() }}",
                    "url": "{{ $data['fileSource'] }}"
                }
            ]
        });
        new Clipboard('[data-clipboard=true]').on('success', function(e) {
            e.clearSelection();
            alert('Copied!');
        });
    @endif
@endsection
@section("content")

<div class="row">
    <div class="col-md-4 col-sm-12">
        <div class="thumbnail">
            <a href="{{ url("book/".$audio->getBook()->getId()) }}">
                <img src="{{ $audio->getBook()->getCover() }}" alt="{{ $audio->getBook()->getName() }}" style="width:100%">
            </a>
        </div>

        @if ($audio->getStatus() == \App\Repositories\BookAudioRepository::STATUS_APPROVED)
        <div class="m-nav-grid mt-0 mb-3">
            <div class="m-nav-grid__row">
                <a href="javascript: alert('You will be able to upvote here, soon!');" class="m-nav-grid__item">
                    <i class="m-nav-grid__icon fa fa-thumbs-o-up"></i>
                    <span class="m-nav-grid__text m--font-metal">Up Vote</span>
                </a>
                <a href="{{ url("https://steemit.com/{$audio->getSteemSlug()}#comments") }}" class="m-nav-grid__item">
                    <i class="m-nav-grid__icon fa fa-comment-o"></i>
                    <span class="m-nav-grid__text m--font-metal">Comment</span>
                </a>
            </div>
            <div class="m-nav-grid__row">
                <a href="#" class="m-nav-grid__item" data-clipboard="true" data-clipboard-target="#embed-code">
                    <i class="m-nav-grid__icon fa fa-volume-up"></i>
                    <span class="m-nav-grid__text m--font-metal">Embed</span>
                </a>
                <a href="{{ url("https://steemit.com/{$audio->getSteemSlug()}") }}" class="m-nav-grid__item">
                    <i class="m-nav-grid__icon fa fa-paper-plane-o m--font-success"></i>
                    <span class="m-nav-grid__text m--font-success">Steemit</span>
                </a>
            </div>
        </div>
        @endif
    </div>


    <div class="col-md-8 col-sm-12">
        @if ($audio->getStatus() == \App\Repositories\BookAudioRepository::STATUS_PENDING)
            <div class="col-md-12 col-sm-12">
                <div class="m-alert m-alert--outline m-alert--outline-2x alert alert-danger" role="alert">
                    <strong>Attention!</strong> This content is under moderator review.
                    @if($audio->getUser()->getId() == auth()->id())
                        The player is only available for you.
                    @else
                        Listening, commenting, upvoting operations are not available until moderator approval.
                    @endif
                </div>
            </div>
        @endif

        @if ($is_playable)
        <div class="col-md-12 col-sm-12">
            <div class="m-portlet m-portlet--bordered bg-secondary">
            <div class="m-portlet__body">
                @include("layout.partials.audio-player")
            </div>
        </div>
        </div>
        @endif

        <div class="col-md-12 col-sm-12">
            <div class="m-portlet m-portlet--bordered">
                <div class="m-portlet__head">
                    <div class="m-portlet__head-caption">
                        <div class="m-portlet__head-title">
                            <h3 class="m-portlet__head-text">
                                {{ author($audio->getUser()) }}
                            </h3>
                        </div>
                    </div>
                </div>
                <div class="m-portlet__body">
                    {!! parse_md($audio->getBody()) !!}
                    <br>
                    @foreach($audio->getTags() as $tag)
                        <a class="btn btn-secondary m-btn m-btn--custom m-btn--label-accent" href="{{ url("https://steemit.com/trending/{$tag->getSlug()}") }}">
                            {{ $tag->getName() }}
                        </a>
                    @endforeach
                </div>
            </div>
        </div>

        <textarea id="embed-code" style="width: 0;height: 0; border: 0; opacity: 0"><iframe src="{{ url("/listen/embed/{$id}") }}" style="border:0px #ffffff none;" name="DNGOBooks" scrolling="no" frameborder="0" marginheight="0px" marginwidth="0px" height="200px" width="600px" allowfullscreen></iframe></textarea>
        <div class="col-md-12">
            <div class="m-portlet">
                <div class="m-portlet__head">
                    <div class="m-portlet__head-caption">
                        <div class="m-portlet__head-title">
                            <h3 class="m-portlet__head-text">
                                Comments
                            </h3>
                        </div>
                    </div>
                </div>
                <div class="m-portlet__body">
                    @if(isset($data['replies']))
                        @each("layout.partials.comments", $data['replies'], 'reply', "layout.partials.comments-none")
                    @else
                        @include("layout.partials.comments-none")
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection