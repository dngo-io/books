@extends("layout.page")
@section("title", "About")
@section("content")
    <div class="row">
        <div class="col-md-12">
            <div class="m-portlet">
                <div class="m-portlet__body">
                    <blockquote class="blockquote">
                        <p class="mb-0">“Nanos gigantum humeris insidentes”</p>
                        <footer class="blockquote-footer">
                            <cite title="Source Title">Discovering truth by building on previous discoveries</cite>
                        </footer>
                    </blockquote>
                </div>
            </div>
        </div>
        <div class="col-md-12">
            <div class="m-portlet m--bg-secondary m-portlet--bordered-semi">
                <div class="m-portlet__head">
                    <div class="m-portlet__head-caption">
                        <div class="m-portlet__head-title">
                            <span class="m-portlet__head-icon m--hide">
                                <i class="la la-gear"></i>
                            </span>
                            <h3 class="m-portlet__head-text">
                                DNGO In A Nutshell
                            </h3>
                        </div>
                    </div>
                </div>
                <div class="m-portlet__body">
                    <p> Dngo is the first blockchain based and decentralized NGO of the world to serve civil society purposes. Dngo aims to increase civil society participation by incentivizing every contribution with cryptocurrencies. By creating its own blockchain based community, Dngo also seeks for providing an open room for deliberative democracy on Steem blockchain.
                    </p>
                    <p>
                        Dngo runs on project based model. It creates various projects to incentivize people to provide valuable outputs. The project outputs, say audiobook archive or language learning database, are publicly accessible. Apart from gifting those valuable contents to the humanity, Dngo dedicates a decent share of its curation rewards and its Community Fund to make donations and charities to support people who are depriving resources.
                    </p>
                    <p>
                        To achieve these goals, Dngo has four founding principles guiding and framing its activities:<br>
                        <br>
                        - Open Democracy Principle<br>
                        - Accountability Principle<br>
                        - Transparency Principle<br>
                        - Blockchain Environmentalism Principle<br>

                    </p>
                    <p>
                        More information about DNGO can be found in Whitepaper or Bluepaper.
                    </p>
                </div>
            </div>
        </div>
        <div class="col-md-9">
            <div class="m-portlet m-portlet--bordered-semi m-portlet--space m-portlet--full-height ">
                <div class="m-portlet__head">
                    <div class="m-portlet__head-caption">
                        <div class="m-portlet__head-title">
                            <h3 class="m-portlet__head-text">
                                {{ author($about['bot']) }}
                                <span class="m-portlet__head-desc">Steemian since {{ member_since($about['bot']) }}</span>
                            </h3>
                        </div>
                    </div>
                    <div class="m-portlet__head-tools">
                    </div>
                </div>
                <div class="m-portlet__body">
                    <div class="m-widget25">
                        <span class="m-widget25__price m--font-brand d-none">$237,650</span>
                        <span class="m-widget25__desc d-none">Total Rewards This Month</span>
                        <div class="m-widget25--progress">
                            <div class="m-widget25__progress">
                                <span class="m-widget25__progress-number">
                                    {{ voting_power($about['bot']) }}%
                                </span>
                                <div class="m--space-10"></div>
                                <div class="progress m-progress--sm">
                                    <div class="progress-bar m--bg-success" role="progressbar" style="width: {{ voting_power($about['bot']) }}%;" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                                <span class="m-widget25__progress-sub">
                                    Voting Power
                                </span>
                            </div>
                            <div class="m-widget25__progress">
                                <span class="m-widget25__progress-number">
                                    {{ $about['users']['ratio'] }}%
                                </span>
                                <div class="m--space-10"></div>
                                <div class="progress m-progress--sm">
                                    <div class="progress-bar m--bg-accent" role="progressbar" style="width: {{ $about['users']['ratio'] }}%;" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                                <span class="m-widget25__progress-sub">
                                    Community in Steemit ({{ "{$about['users']['local']} / {$about['users']['steem']}" }})
                                </span>
                            </div>
                            <div class="m-widget25__progress d-none" >
                                <span class="m-widget25__progress-number">
                                    54%
                                </span>
                                <div class="m--space-10"></div>
                                <div class="progress m-progress--sm">
                                    <div class="progress-bar m--bg-warning" role="progressbar" style="width: 54%;" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                                <span class="m-widget25__progress-sub">

                                </span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <!--begin:: Widgets/Download Files-->
            <div class="m-portlet m-portlet--full-height ">
                <div class="m-portlet__head">
                    <div class="m-portlet__head-caption">
                        <div class="m-portlet__head-title">
                            <h3 class="m-portlet__head-text">
                                Resources
                            </h3>
                        </div>
                    </div>
                    <div class="m-portlet__head-tools">
                    </div>
                </div>
                <div class="m-portlet__body">
                    <!--begin::m-widget4-->
                    <div class="m-widget4">
                        <div class="m-widget4__item">
                            <div class="m-widget4__img m-widget4__img--icon">
                                <img src="{{ asset("assets/app/media/img/files/html.svg") }}" alt="{{ config("app.name") }} Steem Post">
                            </div>
                            <div class="m-widget4__info">
                                <span class="m-widget4__text">
                                Steem Post [TR]
                                </span>
                            </div>
                            <div class="m-widget4__ext">
                                <a href="{{ url(config("steem.about")) }}" class="m-widget4__icon">
                                    <i class="la la-external-link"></i>
                                </a>
                            </div>
                        </div>
                        <div class="m-widget4__item">
                            <div class="m-widget4__img m-widget4__img--icon">
                                <img src="{{ asset("assets/app/media/img/files/pdf.svg") }}" alt="{{ config("app.name") }} Whitepaper PDF">
                            </div>
                            <div class="m-widget4__info">
                                <span class="m-widget4__text">
                                Whitepaper
                                </span>
                            </div>
                            <div class="m-widget4__ext">
                                <a href="{{ asset("dngo-documents/dngo-and-dngo-books-whitepaper.pdf") }}" class="m-widget4__icon">
                                    <i class="la la-download"></i>
                                </a>
                            </div>
                        </div>
                        <div class="m-widget4__item">
                            <div class="m-widget4__img m-widget4__img--icon">
                                <img src="{{ asset("assets/app/media/img/files/pdf.svg") }}" alt="{{ config("app.name") }} Bluepaper PDF">
                            </div>
                            <div class="m-widget4__info">
                                <span class="m-widget4__text">
                                Bluepaper
                                </span>
                            </div>
                            <div class="m-widget4__ext">
                                <a href="{{ asset("dngo-documents/dngo-and-dngo-books-bluepaper.pdf") }}" class="m-widget4__icon">
                                    <i class="la la-download"></i>
                                </a>
                            </div>
                        </div>
                        <div class="m-widget4__item d-none">
                            <div class="m-widget4__img m-widget4__img--icon">
                                <img src="{{ asset("assets/app/media/img/files/pdf.svg") }}" alt="{{ config("app.name") }} Guide PDF">
                            </div>
                            <div class="m-widget4__info">
                                <span class="m-widget4__text">
                                Guide
                                </span>
                            </div>
                            <div class="m-widget4__ext">
                                <a href="#" class="m-widget4__icon">
                                    <i class="la la-download"></i>
                                </a>
                            </div>
                        </div>
                        <div class="m-widget4__item">
                            <div class="m-widget4__img m-widget4__img--icon">
                                <img src="{{ asset("assets/app/media/img/files/zip.svg") }}" alt="{{ config("app.name") }} Visual Materials">
                            </div>
                            <div class="m-widget4__info">
                                <span class="m-widget4__text">
                                Visual Materials
                                </span>
                            </div>
                            <div class="m-widget4__ext">
                                <a href="{{ asset("dngo-documents/dngo-visual-materials.zip") }}" class="m-widget4__icon">
                                    <i class="la la-download"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                    <!--end::Widget 9-->
                </div>
            </div>
            <!--end:: Widgets/Download Files-->
        </div>

        <div class="col-md-12">
            <div class="m-portlet m--bg-secondary m-portlet--bordered-semi">
                <div class="m-portlet__head">
                    <div class="m-portlet__head-caption">
                        <div class="m-portlet__head-title">
                            <span class="m-portlet__head-icon m--hide">
                                <i class="la la-gear"></i>
                            </span>
                            <h3 class="m-portlet__head-text">
                                DNGO Books Project
                            </h3>
                        </div>
                    </div>
                </div>
                <div class="m-portlet__body">
                    <p> Dngo books is Dngo’s first project specifically aims to incentivize people to collectively create multilingual audiobook archive, mainly to serve visually impaired people. Dngo Books is also based on Fair Share Script.
                    </p>
                    <p>
                        As Fair Share Script guides, the following result are expected to be achieved within Dngo Books projects:
                    </p>
                    <p>
                        1) Creating a publicly accessible, multilingual and collectively produced audiobook archive mainly for the public. A special emphasis will be given to the visually impaired people
                    </p>
                    <p>
                        2) Creating a sustainable income source to the Steemit.com users and diversifying and enriching their user experience on the platform
                    </p>
                    <p>
                        3) Assisting people in real need by using Community Fund account and curation rewards. This would increase Steem blockchain’s visibility and make it more sympathetic to the people.
                    </p>
                </div>
            </div>
        </div>
    </div>
    <h3 class="mt-5 mb-5">Team</h3>
    <div class="row">
        @foreach($about['founders'] as $founder)
        <div class="col">
            <div class="card">
                <img class="card-img-top" src="{{ asset($founder['picture']) }}" alt="{{ author($founder, false) }}">
                <div class="card-block p-5">
                    <h5 class="card-title">{{ author($founder) }}</h5>
                    <p class="card-text">
                        <strong>{{ $founder['position'] }}</strong>
                        <br>
                        {{ $founder['location'] }}
                        <br>
                        <small>{{ $founder['about'] }}</small>
                    </p>
                    <a href="https://steemit.com/{{ author($founder, false) }}" class="btn btn-block btn-success">Steem Profile</a>
                </div>
            </div>
        </div>
        @endforeach
    </div>
@endsection