@extends("layout.page")
@section("title", "Road Map")
@section("content")
    <div class="m-timeline-1 m-timeline-1--fixed">
        <div class="m-timeline-1__items">
            <div class="m-timeline-1__marker"></div>
            <div class="m-timeline-1__item m-timeline-1__item--left m-timeline-1__item--first">
                <div class="m-timeline-1__item-circle"><div class="m--bg-danger"></div></div>
                <div class="m-timeline-1__item-arrow"></div>
                <span class="m-timeline-1__item-time m--font-brand">January 2018</span>
                <div class="m-timeline-1__item-content">
                    <div class="m-timeline-1__item-title">
                        Team Building & DNGO Concept Design
                    </div>
                    <div class="m-timeline-1__item-body">
                        <div class="m-list-pics">
                            <a href="{{ url("user/bencagri") }}"><img src="{{ asset($map['bencagri']['picture']) }}" title="bencagri"></a>
                            <a href="{{ url("user/ikidnapmyself") }}"><img src="{{ asset($map['ikidnapmyself']['picture']) }}" title="ikidnapmyself"></a>
                            <a href="{{ url("user/meskoze") }}"><img src="{{ asset($map['meskoze']['picture']) }}" title="meskoze"></a>
                            <a href="{{ url("user/tubi") }}"><img src="{{ asset($map['tubi']['picture']) }}" title="tubi"></a>
                        </div>
                        <div class="m-timeline-1__item-body m--margin-top-15">
                            Exploration of DNGO Concept.
                            <br>
                            Initial steps of creating books project of DNGO.
                        </div>
                    </div>
                </div>
            </div>
            <div class="m-timeline-1__item m-timeline-1__item--right">
                <div class="m-timeline-1__item-circle"><div class="m--bg-danger"></div></div>
                <div class="m-timeline-1__item-arrow"></div>
                <span class="m-timeline-1__item-time m--font-brand">February 2018</span>
                <div class="m-timeline-1__item-content">
                    <div class="m-timeline-1__item-title">
                        Research & Development
                    </div>
                    <div class="m-timeline-1__item-body">
                        Logging in with Steem Connect v2.
                        <br>
                        Reading & writing Steem blockchain
                    </div>
                </div>
            </div>
            <div class="m-timeline-1__item m-timeline-1__item--left">
                <div class="m-timeline-1__item-circle"><div class="m--bg-danger"></div></div>
                <div class="m-timeline-1__item-arrow"></div>
                <span class="m-timeline-1__item-time m--font-brand">February 2018</span>
                <div class="m-timeline-1__item-content">
                    <div class="media">
                        <div class="media-body">
                            <div class="m-timeline-1__item-title">
                                DNGO Whitepaper Genesis Released
                            </div>
                            <div class="m-timeline-1__item-body">
                                Detailed information about DNGO Concept and Books Project.
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="m-timeline-1__item m-timeline-1__item--right">
                <div class="m-timeline-1__item-circle"><div class="m--bg-danger"></div></div>
                <div class="m-timeline-1__item-arrow"></div>
                <span class="m-timeline-1__item-time m--font-brand">March 2018</span>
                <div class="m-timeline-1__item-content">
                    <div class="media">
                        <img class="m--margin-right-20" style="height: auto" src="{{ url("assets/custom/img/dngo-hq-square-logo.png") }}" title="{{ config("app.name") }} Logo">
                        <div class="media-body">
                            <div class="m-timeline-1__item-title m--margin-top-10  ">
                                DNGO Alpha Release
                            </div>
                            <div class="m-timeline-1__item-body">
                                Blockchain reading/writing and Steem Connect v2 tests completed.
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="m-timeline-1__item m-timeline-1__item--left">
                <div class="m-timeline-1__item-circle"><div class="m--bg-danger"></div></div>
                <div class="m-timeline-1__item-arrow"></div>
                <span class="m-timeline-1__item-time m--font-brand">March 2018</span>
                <div class="m-timeline-1__item-content">
                    <div class="m-timeline-1__item-title">
                        Steemian physical meet up in Izmir, TR
                    </div>
                    <hr>
                    <div style="height:170px;">
                        <div style="height:100%;overflow:hidden;display:block;background: url(http://maps.googleapis.com/maps/api/staticmap?center=48.858271,2.294264&amp;size=640x300&amp;zoom=5&amp;key=AIzaSyBMlTEcPR5QULmk9QUaS7lwUK7qtabunEI) no-repeat 50% 50%;">
                            <img src="https://maps.googleapis.com/maps/api/staticmap?center=38.4014762,27.1002453&amp;size=640x300&amp;zoom=11&amp;key=AIzaSyBMlTEcPR5QULmk9QUaS7lwUK7qtabunEI" style="" alt="">
                        </div>
                    </div>
                </div>
            </div>
            <div class="m-timeline-1__item m-timeline-1__item--right">
                <div class="m-timeline-1__item-circle"><div class="m--bg-danger"></div></div>
                <div class="m-timeline-1__item-arrow"></div>
                <span class="m-timeline-1__item-time m--font-brand">March 2018</span>
                <div class="m-timeline-1__item-content">
                    <div class="m-timeline-1__item-title">
                        Dngo Team is growing
                    </div>
                    <div class="m-timeline-1__item-body">
                        <div class="m-list-pics">
                            <a href="{{ url("user/omeratagun") }}"><img src="{{ asset($map['omeratagun']['picture']) }}" title="omeratagun"></a>
                        </div>
                        <div class="m-timeline-1__item-body m--margin-top-15">
                            <a href="{{ url("user/omeratagun") }}" class="m-link">@omeratagun</a> joined project as Supervisor.
                        </div>
                    </div>
                </div>
            </div>
            <div class="m-timeline-1__item m-timeline-1__item--left">
                <div class="m-timeline-1__item-circle"><div class="m--bg-danger"></div></div>
                <div class="m-timeline-1__item-arrow"></div>
                <span class="m-timeline-1__item-time m--font-brand">March 2018</span>
                <div class="m-timeline-1__item-content">
                    <div class="m-timeline-1__item-title">
                        Closed beta released
                    </div>
                    <div class="m-timeline-1__item-body m--margin-top-20">
                        Users started to contribute with test records.
                    </div>
                    <div class="m-timeline-1__item-btn m--margin-top-25">
                        <a href="{{ url(config("steem.about")) }}" class="btn btn-sm btn-outline-accent m-btn m-btn--pill m-btn--custom">Steem Post</a>
                    </div>
                </div>
            </div>
            <div class="m-timeline-1__item m-timeline-1__item--right">
                <div class="m-timeline-1__item-circle"><div class="m--bg-danger"></div></div>
                <div class="m-timeline-1__item-arrow"></div>
                <span class="m-timeline-1__item-time m--font-brand">April 2018</span>
                <div class="m-timeline-1__item-content">
                    <div class="m-timeline-1__item-title">
                        Moderation Team Building
                    </div>
                    <div class="m-timeline-1__item-body m--margin-top-20">
                        Moderators joining team to be ready for public beta.
                    </div>
                </div>
            </div>
            <div class="m-timeline-1__item m-timeline-1__item--left m--margin-top-10">
                <div class="m-timeline-1__item-circle"><div class="m--bg-danger"></div></div>
                <div class="m-timeline-1__item-arrow"></div>
                <span class="m-timeline-1__item-time m--font-brand">April 2018</span>
                <div class="m-timeline-1__item-content">
                    <div class="m-timeline-1__item-title">
                        Project announcement and open beta release
                    </div>
                    <div class="m-timeline-1__item-body m--margin-top-20">
                        Project announcements from different channels and all users starting to contribute.
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection