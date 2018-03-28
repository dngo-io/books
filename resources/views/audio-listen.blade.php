@php /** @var \App\Entities\BookAudio $audio */ @endphp
@extends("layout.page")
@section("title", $audio->getName().' - Chapter #'.$audio->getChapter().' by '.$audio->getBook()->getAuthor()->getName())
@section("script")
    @if ($audio->getStatus() == \App\Repositories\BookAudioRepository::STATUS_APPROVED)
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
    @if ($audio->getStatus() != \App\Repositories\BookAudioRepository::STATUS_APPROVED)
        <div class="row">
            <div class="col-md-12 col-sm-12">
                <div class="alert alert-danger" role="alert">
                    <strong>Ohh!</strong> This content is under moderator review. Until then its not playable.
                </div>
            </div>
        </div>
    @else
    <div class="row">
        <div class="col-md-12 col-sm-12">
            <div class="m-portlet m-portlet--bordered bg-secondary">
                <div class="m-portlet__body">
                    @include("layout.partials.audio-player")
                </div>
            </div>
            <div class="m-nav-grid mt-0 mb-3">
                <div class="m-nav-grid__row">
                    <a href="#" class="m-nav-grid__item">
                        <i class="m-nav-grid__icon fa fa-thumbs-o-up"></i>
                        <span class="m-nav-grid__text m--font-metal">Up Vote</span>
                    </a>
                    <a href="#" class="m-nav-grid__item">
                        <i class="m-nav-grid__icon fa fa-comment-o"></i>
                        <span class="m-nav-grid__text m--font-metal">Comment</span>
                    </a>
                    <a href="#" class="m-nav-grid__item" data-clipboard="true" data-clipboard-target="#embed-code">
                        <i class="m-nav-grid__icon fa fa-volume-up"></i>
                        <span class="m-nav-grid__text m--font-metal">Embed</span>
                    </a>
                    <a href="#" class="m-nav-grid__item">
                        <i class="m-nav-grid__icon fa fa-microphone"></i>
                        <span class="m-nav-grid__text m--font-metal">Read</span>
                    </a>
                </div>
            </div>
        </div>
        <div class="col-md-12">
            <div class="m-portlet  m-portlet--tabs">
                <div class="m-portlet__head">
                    <div class="m-portlet__head-caption">
                        <div class="m-portlet__head-title">
                            <h3 class="m-portlet__head-text">
                                Comments
                            </h3>
                        </div>
                    </div>
                    <div class="m-portlet__head-tools">
                        <ul class="nav nav-tabs m-tabs m-tabs-line m-tabs-line--success m-tabs-line--right" role="tablist">
                            <li class="nav-item m-tabs__item d-none">
                                <a class="nav-link m-tabs__link">
                                    <i class="fa fa-chevron-up"></i>
                                    Up Vote
                                </a>
                            </li>
                            @if($data['body'])
                            <li class="nav-item dropdown m-tabs__item">
                                <a class="nav-link mgit status-tabs__link" href="{{ url("https://steemit.com/{$data['body']['parent_permlink']}/@{$data['body']['author']}/{$data['body']['permlink']}#comments") }}" ><i class="fa fa-comment-o"></i> Comment</a>
                            </li>
                            @endif
                        </ul>
                    </div>
                </div>
                <div class="m-portlet__body">
                    @if ($data['replies'])
                    @each("layout.partials.comments", $data['replies'], 'reply', "layout.partials.comments-none")
                    @endif
                </div>
            </div>
        </div>
    </div>
    <textarea id="embed-code" style="width: 0;height: 0; border: 0; opacity: 0"><iframe src="{{ url("/listen/embed/{$id}") }}" style="border:0px #ffffff none;" name="DNGOBooks" scrolling="no" frameborder="0" marginheight="0px" marginwidth="0px" height="200px" width="600px" allowfullscreen></iframe></textarea>
    @endif
@endsection