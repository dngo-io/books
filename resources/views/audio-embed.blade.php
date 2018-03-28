@php /** @var \App\Entities\BookAudio $audio */ @endphp
@extends("layout.metronic")
@section("title", $audio->getName().' - Chapter #'.$audio->getChapter().' by '.$audio->getBook()->getAuthor()->getName())
@section("script")
    Amplitude.init({
        "songs": [
            {
                "name": "{{ $audio->getName() }}",
                "artist": "{{ $audio->getBook()->getAuthor()->getName()}}",
                "album": "{{ $audio->getBook()->getName() }}",
                "url": "{{ $file }}"
            }
        ]
    });
@endsection
@section("page")
    <div class="m-0">
        @include("layout.partials.audio-player")
    </div>
@endsection