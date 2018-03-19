@extends("layout.metronic")
@section("title", $data['book']['name'].' - Chapter #'.$data['audio']['chapter'].' by '.$data['author']['name'])
@section("script")
    Amplitude.init({
        "songs": [
            {
                "name": "{{ $data['audio']['name'] }}",
                "artist": "{{ $data['author']['name'] }}",
                "album": "{{ $data['book']['name'] }}",
                "url": "{{ $data['audio']['file'] }}"
            }
        ]
    });
@endsection
@section("page")
    <div class="m-0">
        @include("layout.partials.audio-player")
    </div>
@endsection