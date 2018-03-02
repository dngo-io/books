@extends("layout.page")
@section("title", "Listening to \"A Tale Of Two Cities\" by @ikidnapmyself")
@php
    $songs = [
            [
                "name"          => "Risin' High (feat Raashan Ahmad)",
                "artist"        => "Ancient Astronauts",
                "album"         => "We Are to Answer",
                "url"           => "assets/song.mp3",
                "cover_art_url" => "assets/custom/plugins/amplitudejs/examples/album-art/we-are-to-answer.jpg"
            ],
            [
                "name"          => "The Gun",
                "artist"        => "Lorn",
                "album"         => "Ask The Dust",
                "url"           => "assets/song.mp3",
                "cover_art_url" => "assets/custom/plugins/amplitudejs/examples/album-art/ask-the-dust.jpg"
            ],
            [
                "name"          => "Anvil",
                "artist"        => "Lorn",
                "album"         => "Anvil",
                "url"           => "assets/song.mp3",
                "cover_art_url" => "assets/custom/plugins/amplitudejs/examples/album-art/anvil.jpg"
            ],
            [
                "name"          => "I Came Running",
                "artist"        => "Ancient Astronauts",
                "album"         => "We Are to Answer",
                "url"           => "assets/song.mp3",
                "cover_art_url" => "assets/custom/plugins/amplitudejs/examples/album-art/we-are-to-answer.jpg"
            ],
            [
                "name"          => "First Snow",
                "artist"        => "Emancipator",
                "album"         => "Soon It Will Be Cold Enough",
                "url"           => "assets/song.mp3",
                "cover_art_url" => "assets/custom/plugins/amplitudejs/examples/album-art/soon-it-will-be-cold-enough.jpg"
            ],
            [
                "name"          => "Terrain",
                "artist"        => "pg.lost",
                "album"         => "Key",
                "url"           => "assets/song.mp3",
                "cover_art_url" => "assets/custom/plugins/amplitudejs/examples/album-art/key.jpg"
            ],
            [
                "name"          => "Vorel",
                "artist"        => "Russian Circles",
                "album"         => "Guidance",
                "url"           => "assets/song.mp3",
                "cover_art_url" => "assets/custom/plugins/amplitudejs/examples/album-art/guidance.jpg"
            ],
            [
                "name"          => "Intro / Sweet Glory",
                "artist"        => "Jimkata",
                "album"         => "Die Digital",
                "url"           => "assets/song.mp3",
                "cover_art_url" => "assets/custom/plugins/amplitudejs/examples/album-art/die-digital.jpg"
            ],
            [
                "name"          => "Offcut #6",
                "artist"        => "Little People",
                "album"         => "We Are But Hunks of Wood Remixes",
                "url"           => "assets/song.mp3",
                "cover_art_url" => "assets/custom/plugins/amplitudejs/examples/album-art/we-are-but-hunks-of-wood.jpg"
            ],
            [
                "name"          => "Dusk To Dawn",
                "artist"        => "Emancipator",
                "album"         => "Dusk To Dawn",
                "url"           => "assets/song.mp3",
                "cover_art_url" => "assets/custom/plugins/amplitudejs/examples/album-art/from-dusk-to-dawn.jpg"
            ],
            [
                "name"          => "Anthem",
                "artist"        => "Emancipator",
                "album"         => "Soon It Will Be Cold Enough",
                "url"           => "assets/song.mp3",
                "cover_art_url" => "assets/custom/plugins/amplitudejs/examples/album-art/soon-it-will-be-cold-enough.jpg"
            ]
        ];
@endphp
@section("script")
    Amplitude.init({
        "songs": [
            @foreach($songs as $song)
            {
                "name": "{{ $song['name'] }}",
                "artist": "{{ $song['artist'] }}",
                "album": "{{ $song['album'] }}",
                "url": "{{ $song['url'] }}",
                "cover_art_url": "{{ $song['cover_art_url'] }}"
            },
            @endforeach
        ]
    });
@endsection
@section("content")
    <div class="row">
        <div class="col-md-12 col-sm-12">
            <div class="m-portlet m-portlet--bordered bg-secondary">
                <div class="m-portlet__body">
                    <div id="amplitude-player">
                        <div class="row">
                            <div class="col-lg-12 col-md-12 col-sm-12 columns" id="amplitude-left">
                                <div id="player-left-bottom">
                                    <div id="time-container">
                                        <span class="current-time">
                                            <span class="amplitude-current-minutes" amplitude-main-current-minutes="true"></span>:<span class="amplitude-current-seconds" amplitude-main-current-seconds="true"></span>
                                        </span>
                                        <input type="range" class="amplitude-song-slider" amplitude-main-song-slider="true" step=".1"/>
                                        <span class="duration">
                                            <span class="amplitude-duration-minutes" amplitude-main-duration-minutes="true"></span>:<span class="amplitude-duration-seconds" amplitude-main-duration-seconds="true"></span>
                                        </span>
                                    </div>
                                    <div id="control-container">
                                        <div id="repeat-container">
                                            <div class="amplitude-repeat" id="repeat"></div>
                                        </div>
                                        <div id="central-control-container">
                                            <div id="central-controls">
                                                <div class="amplitude-prev" id="previous"></div>
                                                <div class="amplitude-play-pause" amplitude-main-play-pause="true" id="play-pause"></div>
                                                <div class="amplitude-next" id="next"></div>
                                            </div>
                                        </div>
                                        <div id="shuffle-container">
                                            <div class="amplitude-shuffle amplitude-shuffle-off" id="shuffle"></div>
                                        </div>
                                    </div>

                                    <div id="meta-container">
                                        <span amplitude-song-info="name" amplitude-main-song-info="true" class="song-name"></span>

                                        <div class="song-artist-album">
                                            <span amplitude-song-info="artist" amplitude-main-song-info="true"></span>
                                            <span amplitude-song-info="album" amplitude-main-song-info="true"></span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-6 col-sm-12">
            <div class="m-portlet m-portlet--full-height">
                <div class="m-portlet__head">
                    <div class="m-portlet__head-caption">
                        <div class="m-portlet__head-title">
                            <h3 class="m-portlet__head-text">
                                Chapters
                            </h3>
                        </div>
                    </div>
                    <div class="m-portlet__head-tools">
                    </div>
                </div>
                <div class="m-portlet__body">
                    <div class="m-scrollable" data-scrollable="true" data-max-height="250" data-scrollbar-shown="true">
                        <div id="amplitude-right">
                        @php($i = 0)
                        @foreach($songs as $song)
                            <div class="song amplitude-song-container amplitude-play-pause" amplitude-song-index="{{ $i++ }}">
                                <div class="song-now-playing-icon-container">
                                    <div class="play-button-container">

                                    </div>
                                    <img class="now-playing" src="{{ asset("assets/custom/plugins/amplitudejs/examples/blue-playlist/img/now-playing.svg") }}"/>
                                </div>
                                <div class="song-meta-data">
                                    <span class="song-title">{{ $song['name'] }}</span>
                                    <span class="song-artist">{{ $song['artist'] }}</span>
                                </div>
                                <span class="song-duration">3:30</span>
                            </div>
                        @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-6 col-sm-12">
            <div class="m-portlet m-portlet--full-height">
                <div class="m-portlet__head">
                    <div class="m-portlet__head-caption">
                        <div class="m-portlet__head-title">
                            <h3 class="m-portlet__head-text">
                                Actions
                            </h3>
                        </div>
                    </div>
                    <div class="m-portlet__head-tools">
                    </div>
                </div>
                <div class="m-portlet__body">
                    <div class="m-nav-grid">
                        <div class="m-nav-grid__row">
                            <a href="#" class="m-nav-grid__item">
                                <i class="m-nav-grid__icon fa fa-thumbs-o-up"></i>
                                <span class="m-nav-grid__text m--font-metal">Up Vote</span>
                            </a>
                            <a href="#" class="m-nav-grid__item">
                                <i class="m-nav-grid__icon fa fa-microphone"></i>
                                <span class="m-nav-grid__text m--font-metal">Read</span>
                            </a>
                        </div>
                        <div class="m-nav-grid__row">
                            <a href="#" class="m-nav-grid__item">
                                <i class="m-nav-grid__icon fa fa-comment-o"></i>
                                <span class="m-nav-grid__text m--font-metal">Comment</span>
                            </a>
                            <a href="#" class="m-nav-grid__item">
                                <i class="m-nav-grid__icon fa fa-user"></i>
                                <span class="m-nav-grid__text m--font-metal">User's Page</span>
                            </a>
                        </div>
                    </div>
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
                            <li class="nav-item m-tabs__item">
                                <a class="nav-link m-tabs__link">
                                    <i class="fa fa-chevron-up"></i>
                                    Up Vote
                                </a>
                            </li>
                            <li class="nav-item dropdown m-tabs__item">
                                <a class="nav-link m-tabs__link" href="#" ><i class="fa fa-comment-o"></i> Comment</a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="m-portlet__body">
                    <div class="media">
                        <img class="mr-3 m--img-rounded" src="{{ asset("assets/app/media/img/users/100_2.jpg") }}" width="64" alt="Generic placeholder image">
                        <div class="media-body">
                            <h5 class="mt-0">Media heading</h5>
                            Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin. Cras purus odio, vestibulum in vulputate at, tempus viverra turpis. Fusce condimentum nunc ac nisi vulputate fringilla. Donec lacinia congue felis in faucibus.
                            <p>
                                <i class="fa fa-chevron-up"></i> $0.00
                                <a href="#" class="ml-5 m-link">Reply</a>
                            </p>
                            <div class="media mt-3">
                                <a class="pr-3" href="#">
                                    <img src="{{ asset("assets/app/media/img/users/100_1.jpg") }}" class="m--img-rounded" width="64" alt="Generic placeholder image">
                                </a>
                                <div class="media-body">
                                    <h5 class="mt-0">Media heading</h5>
                                    Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin. Cras purus odio, vestibulum in vulputate at, tempus viverra turpis. Fusce condimentum nunc ac nisi vulputate fringilla. Donec lacinia congue felis in faucibus.
                                    <p>
                                        <i class="fa fa-chevron-up m--font-success"></i> $0.01
                                        <a href="#" class="ml-5 m-link">Reply</a>
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="media">
                        <img class="mr-3 m--img-rounded" src="{{ asset("assets/app/media/img/users/100_3.jpg") }}" width="64" alt="Generic placeholder image">
                        <div class="media-body">
                            <h5 class="mt-0">Media heading</h5>
                            Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin. Cras purus odio, vestibulum in vulputate at, tempus viverra turpis. Fusce condimentum nunc ac nisi vulputate fringilla. Donec lacinia congue felis in faucibus.
                            <p>
                                <i class="fa fa-chevron-up"></i> $0.00
                                <a href="#" class="ml-5 m-link">Reply</a>
                            </p>
                        </div>
                    </div>
                    <div class="media">
                        <img class="mr-3 m--img-rounded" src="{{ asset("assets/app/media/img/users/100_4.jpg") }}" width="64" alt="Generic placeholder image">
                        <div class="media-body">
                            <h5 class="mt-0">Media heading</h5>
                            Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin. Cras purus odio, vestibulum in vulputate at, tempus viverra turpis. Fusce condimentum nunc ac nisi vulputate fringilla. Donec lacinia congue felis in faucibus.
                            <p>
                                <i class="fa fa-chevron-up"></i> $0.00
                                <a href="#" class="ml-5 m-link">Reply</a>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection