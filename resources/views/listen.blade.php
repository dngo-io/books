@extends("layout.page")
@section("title", "Listening to \"A Tale Of Two Cities\" by @ikidnapmyself")
@php
    $songs = [
            [
                "name"          => "Risin' High (feat Raashan Ahmad)",
                "artist"        => "Ancient Astronauts",
                "album"         => "We Are to Answer",
                "url"           => "assets/2Cellos - Hurt.mp3",
                "cover_art_url" => "assets/custom/plugins/amplitudejs/examples/album-art/we-are-to-answer.jpg"
            ],
            [
                "name"          => "The Gun",
                "artist"        => "Lorn",
                "album"         => "Ask The Dust",
                "url"           => "../songs/08 The Gun.mp3",
                "cover_art_url" => "assets/custom/plugins/amplitudejs/examples/album-art/ask-the-dust.jpg"
            ],
            [
                "name"          => "Anvil",
                "artist"        => "Lorn",
                "album"         => "Anvil",
                "url"           => "../songs/LORN - ANVIL.mp3",
                "cover_art_url" => "assets/custom/plugins/amplitudejs/examples/album-art/anvil.jpg"
            ],
            [
                "name"          => "I Came Running",
                "artist"        => "Ancient Astronauts",
                "album"         => "We Are to Answer",
                "url"           => "../songs/ICameRunning-AncientAstronauts.mp3",
                "cover_art_url" => "assets/custom/plugins/amplitudejs/examples/album-art/we-are-to-answer.jpg"
            ],
            [
                "name"          => "First Snow",
                "artist"        => "Emancipator",
                "album"         => "Soon It Will Be Cold Enough",
                "url"           => "../songs/FirstSnow-Emancipator.mp3",
                "cover_art_url" => "assets/custom/plugins/amplitudejs/examples/album-art/soon-it-will-be-cold-enough.jpg"
            ],
            [
                "name"          => "Terrain",
                "artist"        => "pg.lost",
                "album"         => "Key",
                "url"           => "../songs/Terrain-pglost.mp3",
                "cover_art_url" => "assets/custom/plugins/amplitudejs/examples/album-art/key.jpg"
            ],
            [
                "name"          => "Vorel",
                "artist"        => "Russian Circles",
                "album"         => "Guidance",
                "url"           => "../songs/Vorel-RussianCircles.mp3",
                "cover_art_url" => "assets/custom/plugins/amplitudejs/examples/album-art/guidance.jpg"
            ],
            [
                "name"          => "Intro / Sweet Glory",
                "artist"        => "Jimkata",
                "album"         => "Die Digital",
                "url"           => "../songs/IntroSweetGlory-Jimkata.mp3",
                "cover_art_url" => "assets/custom/plugins/amplitudejs/examples/album-art/die-digital.jpg"
            ],
            [
                "name"          => "Offcut #6",
                "artist"        => "Little People",
                "album"         => "We Are But Hunks of Wood Remixes",
                "url"           => "../songs/Offcut6-LittlePeople.mp3",
                "cover_art_url" => "assets/custom/plugins/amplitudejs/examples/album-art/we-are-but-hunks-of-wood.jpg"
            ],
            [
                "name"          => "Dusk To Dawn",
                "artist"        => "Emancipator",
                "album"         => "Dusk To Dawn",
                "url"           => "../songs/DuskToDawn-Emancipator.mp3",
                "cover_art_url" => "assets/custom/plugins/amplitudejs/examples/album-art/from-dusk-to-dawn.jpg"
            ],
            [
                "name"          => "Anthem",
                "artist"        => "Emancipator",
                "album"         => "Soon It Will Be Cold Enough",
                "url"           => "../songs/Anthem-Emancipator.mp3",
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
        <div class="col-md-4">
            <div class="m-portlet m-portlet--bordered-semi m-portlet--widget-fit m-portlet--full-height m-portlet--skin-light  m-portlet--rounded-force">
                <div class="m-portlet__head">
                    <div class="m-portlet__head-caption">
                        <div class="m-portlet__head-title">
                            <h3 class="m-portlet__head-text">
                                Listen
                            </h3>
                        </div>
                    </div>
                    <div class="m-portlet__head-tools">
                    </div>
                </div>
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
        <div class="col-md-4">
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
                    <div class="m-scrollable" data-scrollable="true" data-max-height="500" data-scrollbar-shown="true">
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
        <div class="col-md-4">
            <div class="m-portlet m-portlet--bordered-semi m-portlet--widget-fit m-portlet--full-height m-portlet--skin-light  m-portlet--rounded-force">
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
                    <div class="m-widget17">
                        <div class="m-widget17__visual m-widget17__visual--chart m-portlet-fit--top m-portlet-fit--sides m--bg-secondary">
                            <div class="m-widget17__chart" style="height:320px;">
                                <canvas id="m_chart_activities"></canvas>
                            </div>
                        </div>
                        <div class="m-widget17__stats">
                            <div class="m-widget17__items m-widget17__items-col1">
                                <div class="m-widget17__item">
                                    <span class="m-widget17__icon">
                                        <i class="fa fa-thumbs-o-up m--font-info"></i>
                                    </span>
                                    <span class="m-widget17__subtitle">
                                        Up Vote
                                    </span>
                                    <span class="m-widget17__desc">
                                        340 Up Votes
                                    </span>
                                </div>
                                <div class="m-widget17__item">
                                    <span class="m-widget17__icon">
                                        <i class="fa fa-microphone m--font-brand"></i>
                                    </span>
                                    <span class="m-widget17__subtitle">
                                        Read
                                    </span>
                                    <span class="m-widget17__desc">
                                        15 Contributors
                                    </span>
                                </div>
                            </div>
                            <div class="m-widget17__items m-widget17__items-col2">
                                <div class="m-widget17__item">
                                    <span class="m-widget17__icon">
                                        <i class="fa fa-comment-o m--font-warning"></i>
                                    </span>
                                    <span class="m-widget17__subtitle">
                                        Comment
                                    </span>
                                    <span class="m-widget17__desc">
                                        72 Comments
                                    </span>
                                </div>
                                <div class="m-widget17__item">
                                    <span class="m-widget17__icon">
                                        <i class="fa fa-user m--font-danger"></i>
                                    </span>
                                    <span class="m-widget17__subtitle">
                                        User's Page
                                    </span>
                                    <span class="m-widget17__desc">
                                        34 Contributions
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="m-portlet m-portlet--bordered-semi m-portlet--half-height m-portlet--fit " style="min-height: 300px">
                <div class="m-portlet__head">
                    <div class="m-portlet__head-caption">
                        <div class="m-portlet__head-title">
                            <h3 class="m-portlet__head-text">
                                Popularity
                            </h3>
                        </div>
                    </div>
                    <div class="m-portlet__head-tools">
                    </div>
                </div>
                <div class="m-portlet__body">
                    <div class="m-widget20">
                        <div class="m-widget20__number m--font-success">670</div>
                        <div class="m-widget20__chart" style="height:160px;">
                            <canvas id="m_chart_bandwidth1"></canvas>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="m-portlet m-portlet--bordered-semi m-portlet--half-height m-portlet--fit " style="min-height: 300px">
                <div class="m-portlet__head">
                    <div class="m-portlet__head-caption">
                        <div class="m-portlet__head-title">
                            <h3 class="m-portlet__head-text">
                                Vote
                            </h3>
                        </div>
                    </div>
                    <div class="m-portlet__head-tools">
                    </div>
                </div>
                <div class="m-portlet__body">
                    <div class="m-widget20">
                        <div class="m-widget20__number m--font-warning">340</div>
                        <div class="m-widget20__chart" style="height:160px;">
                            <canvas id="m_chart_bandwidth2"></canvas>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-12">
            <div class="m-portlet m-portlet--full-height">
                <div class="m-portlet__head">
                    <div class="m-portlet__head-caption">
                        <div class="m-portlet__head-title">
                            <h3 class="m-portlet__head-text">
                                You May Like
                            </h3>
                        </div>
                    </div>
                    <div class="m-portlet__head-tools">
                        <ul class="nav nav-pills nav-pills--brand m-nav-pills--align-right m-nav-pills--btn-pill m-nav-pills--btn-sm" role="tablist">
                            <li class="nav-item m-tabs__item">
                                <a class="nav-link m-tabs__link active" data-toggle="tab" href="#m_widget5_tab1_content" role="tab">
                                    Similar
                                </a>
                            </li>
                            <li class="nav-item m-tabs__item">
                                <a class="nav-link m-tabs__link" data-toggle="tab" href="#m_widget5_tab2_content" role="tab">
                                    From This Author
                                </a>
                            </li>
                            <li class="nav-item m-tabs__item">
                                <a class="nav-link m-tabs__link" data-toggle="tab" href="#m_widget5_tab3_content" role="tab">
                                    From This Contributor
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="m-portlet__body">
                    <!--begin::Content-->
                    <div class="tab-content">
                        <div class="tab-pane active" id="m_widget5_tab1_content" aria-expanded="true">
                            <!--begin::m-widget5-->
                            <div class="m-widget5">
                                <div class="m-widget5__item">
                                    <div class="m-widget5__pic">
                                        <img class="m-widget7__img" src="{{ asset("assets/app/media/img//products/product6.jpg") }}" alt="">
                                    </div>
                                    <div class="m-widget5__content">
                                        <h4 class="m-widget5__title">
                                            Great Logo Designn
                                        </h4>
                                        <span class="m-widget5__desc">
                                            Make Metronic Great  Again.Lorem Ipsum Amet
                                        </span>
                                        <div class="m-widget5__info">
                                        <span class="m-widget5__author">
                                        Author:
                                        </span>
                                            <span class="m-widget5__info-label">
								author:
								</span>
                                            <span class="m-widget5__info-author-name">
                                            Fly themes
                                            </span>
                                            <span class="m-widget5__info-label">
								Released:
								</span>
                                            <span class="m-widget5__info-date m--font-info">
								23.08.17
								</span>
                                        </div>
                                    </div>
                                    <div class="m-widget5__stats1">
                                        <span class="m-widget5__number">19,200</span><br>
                                        <span class="m-widget5__sales">Played</span>
                                    </div>
                                    <div class="m-widget5__stats2">
                                        <span class="m-widget5__number">1046</span><br>
                                        <span class="m-widget5__votes">Likes</span>
                                    </div>
                                </div>
                                <div class="m-widget5__item">
                                    <div class="m-widget5__pic">
                                        <img class="m-widget7__img" src="{{ asset("assets/app/media/img//products/product10.jpg") }}" alt="">
                                    </div>
                                    <div class="m-widget5__content">
                                        <h4 class="m-widget5__title">
                                            Branding Mockup
                                        </h4>
                                        <span class="m-widget5__desc">
                                        Make Metronic Great  Again.Lorem Ipsum Amet
                                        </span>
                                        <div class="m-widget5__info">
                                        <span class="m-widget5__author">
                                        Author:
                                        </span>
                                            <span class="m-widget5__info-author m--font-info">
                                            Fly themes
                                            </span>
                                            <span class="m-widget5__info-label">
								Released:
								</span>
                                            <span class="m-widget5__info-date m--font-info">
								23.08.17
								</span>
                                        </div>
                                    </div>
                                    <div class="m-widget5__stats1">
                                        <span class="m-widget5__number">24,583</span><br>
                                        <span class="m-widget5__sales">Played</span>
                                    </div>
                                    <div class="m-widget5__stats2">
                                        <span class="m-widget5__number">3809</span><br>
                                        <span class="m-widget5__votes">Likes</span>
                                    </div>
                                </div>
                                <div class="m-widget5__item">
                                    <div class="m-widget5__pic">
                                        <img class="m-widget7__img" src="{{ asset("assets/app/media/img//products/product11.jpg") }}" alt="">
                                    </div>
                                    <div class="m-widget5__content">
                                        <h4 class="m-widget5__title">
                                            Awesome Mobile App
                                        </h4>
                                        <span class="m-widget5__desc">
                                        Make Metronic Great  Again.Lorem Ipsum Amet
                                        </span>
                                        <div class="m-widget5__info">
                                        <span class="m-widget5__author">
                                        Author:
                                        </span>
                                            <span class="m-widget5__info-author m--font-info">
                                            Fly themes
                                            </span>
                                            <span class="m-widget5__info-label">
								Released:
								</span>
                                            <span class="m-widget5__info-date m--font-info">
								23.08.17
								</span>
                                        </div>
                                    </div>
                                    <div class="m-widget5__stats1">
                                        <span class="m-widget5__number">10,054</span><br>
                                        <span class="m-widget5__sales">Played</span>
                                    </div>
                                    <div class="m-widget5__stats2">
                                        <span class="m-widget5__number">1103</span><br>
                                        <span class="m-widget5__votes">Likes</span>
                                    </div>
                                </div>
                            </div>
                            <!--end::m-widget5-->
                        </div>
                        <div class="tab-pane" id="m_widget5_tab2_content" aria-expanded="false">
                            <!--begin::m-widget5-->
                            <div class="m-widget5">
                                <div class="m-widget5__item">
                                    <div class="m-widget5__pic">
                                        <img class="m-widget7__img" src="{{ asset("assets/app/media/img//products/product11.jpg") }}" alt="">
                                    </div>
                                    <div class="m-widget5__content">
                                        <h4 class="m-widget5__title">
                                            Branding Mockup
                                        </h4>
                                        <span class="m-widget5__desc">
                                        Make Metronic Great  Again.Lorem Ipsum Amet
                                        </span>
                                        <div class="m-widget5__info">
                                        <span class="m-widget5__author">
                                        Author:
                                        </span>
                                            <span class="m-widget5__info-author m--font-info">
                                            Fly themes
                                            </span>
                                            <span class="m-widget5__info-label">
								Released:
								</span>
                                            <span class="m-widget5__info-date m--font-info">
								23.08.17
								</span>
                                        </div>
                                    </div>
                                    <div class="m-widget5__stats1">
                                        <span class="m-widget5__number">24,583</span><br>
                                        <span class="m-widget5__sales">Played</span>
                                    </div>
                                    <div class="m-widget5__stats2">
                                        <span class="m-widget5__number">3809</span><br>
                                        <span class="m-widget5__votes">Likes</span>
                                    </div>
                                </div>
                                <div class="m-widget5__item">
                                    <div class="m-widget5__pic">
                                        <img class="m-widget7__img" src="{{ asset("assets/app/media/img//products/product6.jpg") }}" alt="">
                                    </div>
                                    <div class="m-widget5__content">
                                        <h4 class="m-widget5__title">
                                            Great Logo Designn
                                        </h4>
                                        <span class="m-widget5__desc">
                                        Make Metronic Great  Again.Lorem Ipsum Amet
                                        </span>
                                        <div class="m-widget5__info">
                                        <span class="m-widget5__author">
                                        Author:
                                        </span>
                                            <span class="m-widget5__info-author m--font-info">
                                            Fly themes
                                            </span>
                                            <span class="m-widget5__info-label">
								Released:
								</span>
                                            <span class="m-widget5__info-date m--font-info">
								23.08.17
								</span>
                                        </div>
                                    </div>
                                    <div class="m-widget5__stats1">
                                        <span class="m-widget5__number">19,200</span><br>
                                        <span class="m-widget5__sales">Played</span>
                                    </div>
                                    <div class="m-widget5__stats2">
                                        <span class="m-widget5__number">1046</span><br>
                                        <span class="m-widget5__votes">Likes</span>
                                    </div>
                                </div>
                                <div class="m-widget5__item">
                                    <div class="m-widget5__pic">
                                        <img class="m-widget7__img" src="{{ asset("assets/app/media/img//products/product10.jpg") }}" alt="">
                                    </div>
                                    <div class="m-widget5__content">
                                        <h4 class="m-widget5__title">
                                            Awesome Mobile App
                                        </h4>
                                        <span class="m-widget5__desc">
                                        Make Metronic Great  Again.Lorem Ipsum Amet
                                        </span>
                                        <div class="m-widget5__info">
                                        <span class="m-widget5__author">
                                        Author:
                                        </span>
                                            <span class="m-widget5__info-author m--font-info">
                                            Fly themes
                                            </span>
                                            <span class="m-widget5__info-label">
								Released:
								</span>
                                            <span class="m-widget5__info-date m--font-info">
								23.08.17
								</span>
                                        </div>
                                    </div>
                                    <div class="m-widget5__stats1">
                                        <span class="m-widget5__number">10,054</span><br>
                                        <span class="m-widget5__sales">Played</span>
                                    </div>
                                    <div class="m-widget5__stats2">
                                        <span class="m-widget5__number">1103</span><br>
                                        <span class="m-widget5__votes">Likes</span>
                                    </div>
                                </div>
                            </div>
                            <!--end::m-widget5-->
                        </div>
                        <div class="tab-pane" id="m_widget5_tab3_content" aria-expanded="false">
                            <!--begin::m-widget5-->
                            <div class="m-widget5">
                                <div class="m-widget5__item">
                                    <div class="m-widget5__pic">
                                        <img class="m-widget7__img" src="{{ asset("assets/app/media/img//products/product10.jpg") }}" alt="">
                                    </div>
                                    <div class="m-widget5__content">
                                        <h4 class="m-widget5__title">
                                            Branding Mockup
                                        </h4>
                                        <span class="m-widget5__desc">
                                        Make Metronic Great  Again.Lorem Ipsum Amet
                                        </span>
                                        <div class="m-widget5__info">
                                        <span class="m-widget5__author">
                                        Author:
                                        </span>
                                            <span class="m-widget5__info-author m--font-info">
                                            Fly themes
                                            </span>
                                            <span class="m-widget5__info-label">
                                            Released:
                                            </span>
                                            <span class="m-widget5__info-date m--font-info">
                                            23.08.17
                                            </span>
                                        </div>
                                    </div>
                                    <div class="m-widget5__stats1">
                                        <span class="m-widget5__number">10.054</span><br>
                                        <span class="m-widget5__sales">Played</span>
                                    </div>
                                    <div class="m-widget5__stats2">
                                        <span class="m-widget5__number">1103</span><br>
                                        <span class="m-widget5__votes">Likes</span>
                                    </div>
                                </div>
                                <div class="m-widget5__item">
                                    <div class="m-widget5__pic">
                                        <img class="m-widget7__img" src="{{ asset("assets/app/media/img//products/product11.jpg") }}" alt="">
                                    </div>
                                    <div class="m-widget5__content">
                                        <h4 class="m-widget5__title">
                                            Great Logo Designn
                                        </h4>
                                        <span class="m-widget5__desc">
                                        Make Metronic Great  Again.Lorem Ipsum Amet
                                        </span>
                                        <div class="m-widget5__info">
                                        <span class="m-widget5__author">
                                        Author:
                                        </span>
                                            <span class="m-widget5__info-author m--font-info">
                                            Fly themes
                                            </span>
                                            <span class="m-widget5__info-label">
                                            Released:
                                            </span>
                                            <span class="m-widget5__info-date m--font-info">
                                            23.08.17
                                            </span>
                                        </div>
                                    </div>
                                    <div class="m-widget5__stats1">
                                        <span class="m-widget5__number">24,583</span><br>
                                        <span class="m-widget5__sales">Played</span>
                                    </div>
                                    <div class="m-widget5__stats2">
                                        <span class="m-widget5__number">3809</span><br>
                                        <span class="m-widget5__votes">Likes</span>
                                    </div>
                                </div>
                                <div class="m-widget5__item">
                                    <div class="m-widget5__pic">
                                        <img class="m-widget7__img" src="{{ asset("assets/app/media/img//products/product6.jpg") }}" alt="">
                                    </div>
                                    <div class="m-widget5__content">
                                        <h4 class="m-widget5__title">
                                            Awesome Mobile App
                                        </h4>
                                        <span class="m-widget5__desc">
                                        Make Metronic Great  Again.Lorem Ipsum Amet
                                        </span>
                                        <div class="m-widget5__info">
                                        <span class="m-widget5__author">
                                        Author:
                                        </span>
                                            <span class="m-widget5__info-author m--font-info">
                                            Fly themes
                                            </span>
                                            <span class="m-widget5__info-label">
								Released:
								</span>
                                            <span class="m-widget5__info-date m--font-info">
								23.08.17
								</span>
                                        </div>
                                    </div>
                                    <div class="m-widget5__stats1">
                                        <span class="m-widget5__number">19,200</span><br>
                                        <span class="m-widget5__sales">1046</span>
                                    </div>
                                    <div class="m-widget5__stats2">
                                        <span class="m-widget5__number">1046</span><br>
                                        <span class="m-widget5__votes">Likes</span>
                                    </div>
                                </div>
                            </div>
                            <!--end::m-widget5-->
                        </div>
                    </div>
                    <!--end::Content-->
                </div>
            </div>
        </div>
    </div>
@endsection