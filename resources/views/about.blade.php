@extends("layout.page")
@section("title", "About")
@section("content")
    <div class="row">
        <div class="col-md-12">
            <div class="m-portlet">
                <div class="m-portlet__body">
                    <blockquote class="blockquote">
                        <p class="mb-0">There's none so blind as those who will not see.</p>
                        <footer class="blockquote-footer">
                            Kıssadan hisse by <cite title="Source Title">Proverb</cite>
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
                                An introduction to {{ config("app.name") }} Project
                            </h3>
                        </div>
                    </div>
                </div>
                <div class="m-portlet__body">
                    <p> Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque diam mi, pellentesque eu
                        turpis eget, bibendum varius neque. Duis ullamcorper neque eget eros euismod consequat. Proin
                        gravida ullamcorper eros, nec dapibus lectus feugiat vitae. Donec faucibus ex quis est vulputate,
                        a mattis est imperdiet. Proin nec eros odio. Aenean non elit mollis est interdum elementum. Sed
                        sit amet elit eu magna posuere euismod. Donec sed rhoncus elit. Suspendisse eu purus non tortor
                        gravida molestie id eget magna. Morbi eu fringilla ante, vitae ullamcorper eros. Pellentesque nec
                        urna eu dui pharetra ultrices.
                    </p>
                    <p>
                        Duis tempor pharetra nisl nec efficitur. Ut nec placerat justo. Cras at nunc viverra, venenatis
                        mauris eget, pellentesque tortor. Maecenas tellus odio, tempus at nulla et, vulputate dapibus lacus.
                        Duis ullamcorper, leo eu tempus consequat, mauris nisi elementum ipsum, vel aliquet ipsum sapien eu
                        massa. Donec at malesuada lectus. Etiam ac purus vitae risus pharetra euismod. Etiam ac nulla mattis,
                        hendrerit quam id, imperdiet justo. Etiam elementum magna nec dictum tempor. Interdum et malesuada
                        fames ac ante ipsum primis in faucibus. Vivamus mattis consequat magna. Vestibulum sit amet lacinia neque.
                        Praesent ex ipsum, mattis eu malesuada ut, facilisis ut diam. Proin vehicula nunc tortor, sit amet
                        consequat tortor pulvinar ut.
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
                                What Have We Done?
                                <span class="m-portlet__head-desc">Total Rewards By Contribution</span>
                            </h3>
                        </div>
                    </div>
                    <div class="m-portlet__head-tools">
                    </div>
                </div>
                <div class="m-portlet__body">
                    <div class="m-widget25">
                        <span class="m-widget25__price m--font-brand">$237,650</span>
                        <span class="m-widget25__desc">Total Rewards This Month</span>
                        <div class="m-widget25--progress">
                            <div class="m-widget25__progress">
                                <span class="m-widget25__progress-number">
                                    63%
                                </span>
                                <div class="m--space-10"></div>
                                <div class="progress m-progress--sm">
                                    <div class="progress-bar m--bg-danger" role="progressbar" style="width: 63%;" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                                <span class="m-widget25__progress-sub">
                                    Sales Growth
                                </span>
                            </div>
                            <div class="m-widget25__progress">
                                <span class="m-widget25__progress-number">
                                    39%
                                </span>
                                <div class="m--space-10"></div>
                                <div class="progress m-progress--sm">
                                    <div class="progress-bar m--bg-accent" role="progressbar" style="width: 39%;" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                                <span class="m-widget25__progress-sub">
                                    Product Growth
                                </span>
                            </div>
                            <div class="m-widget25__progress" >
                                <span class="m-widget25__progress-number">
                                    54%
                                </span>
                                <div class="m--space-10"></div>
                                <div class="progress m-progress--sm">
                                    <div class="progress-bar m--bg-warning" role="progressbar" style="width: 54%;" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                                <span class="m-widget25__progress-sub">
                                    Community Growth
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
                                Steem Post
                                </span>
                            </div>
                            <div class="m-widget4__ext">
                                <a href="#" class="m-widget4__icon">
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
                                <a href="#" class="m-widget4__icon">
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
                                <a href="#" class="m-widget4__icon">
                                    <i class="la la-download"></i>
                                </a>
                            </div>
                        </div>
                        <div class="m-widget4__item">
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
                                <img src="{{ asset("assets/app/media/img/files/zip.svg") }}" alt="{{ config("app.name") }} Source Code">
                            </div>
                            <div class="m-widget4__info">
                                <span class="m-widget4__text">
                                Source Code
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
                                <a href="#" class="m-widget4__icon">
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
                                More About {{ config("app.name") }} Project
                            </h3>
                        </div>
                    </div>
                </div>
                <div class="m-portlet__body">
                    <p> Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque diam mi, pellentesque eu
                        turpis eget, bibendum varius neque. Duis ullamcorper neque eget eros euismod consequat. Proin
                        gravida ullamcorper eros, nec dapibus lectus feugiat vitae. Donec faucibus ex quis est vulputate,
                        a mattis est imperdiet. Proin nec eros odio. Aenean non elit mollis est interdum elementum. Sed
                        sit amet elit eu magna posuere euismod. Donec sed rhoncus elit. Suspendisse eu purus non tortor
                        gravida molestie id eget magna. Morbi eu fringilla ante, vitae ullamcorper eros. Pellentesque nec
                        urna eu dui pharetra ultrices.
                    </p>
                    <p>
                        Duis tempor pharetra nisl nec efficitur. Ut nec placerat justo. Cras at nunc viverra, venenatis
                        mauris eget, pellentesque tortor. Maecenas tellus odio, tempus at nulla et, vulputate dapibus lacus.
                        Duis ullamcorper, leo eu tempus consequat, mauris nisi elementum ipsum, vel aliquet ipsum sapien eu
                        massa. Donec at malesuada lectus. Etiam ac purus vitae risus pharetra euismod. Etiam ac nulla mattis,
                        hendrerit quam id, imperdiet justo. Etiam elementum magna nec dictum tempor. Interdum et malesuada
                        fames ac ante ipsum primis in faucibus. Vivamus mattis consequat magna. Vestibulum sit amet lacinia neque.
                        Praesent ex ipsum, mattis eu malesuada ut, facilisis ut diam. Proin vehicula nunc tortor, sit amet
                        consequat tortor pulvinar ut.
                    </p>
                </div>
            </div>
        </div>
    </div>
    <h3 class="mt-5 mb-5">Founders</h3>
    <div class="row">
        @foreach($founders as $founder)
        <div class="col">
            <div class="card">
                <img class="card-img-top" src="{{ asset($founder['picture']) }}" alt="{{ $founder['account'] }}">
                <div class="card-block p-5">
                    <h5 class="card-title">{{ author($founder['account'], $founder['reputation']) }}</h5>
                    <p class="card-text">
                        {{ $founder['location'] }}
                        <br>
                        {{ $founder['about'] }}
                    </p>
                    <a href="https://steemit.com/{{ "@{$founder['account']}" }}" class="btn btn-block btn-success">Steem Profile</a>
                </div>
            </div>
        </div>
        @endforeach
    </div>
    <h3 class="mt-5 mb-5">Special Thanks To...</h3>
    <div class="row">
        <div class="col">
            <div class="card">
                <img class="card-img-top" src="{{ asset("assets/app/media/img/users/300_2.jpg") }}" alt="Card image cap">
                <div class="card-block p-5">
                    <h5 class="card-title">Denny J. Choi</h5>
                    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                    <a href="#" class="btn btn-block btn-secondary">
                        <i class="fa fa-linkedin"></i>
                    </a>
                </div>
            </div>
        </div>
        <div class="col">
            <div class="card">
                <img class="card-img-top" src="{{ asset("assets/app/media/img/users/300_3.jpg") }}" alt="Card image cap">
                <div class="card-block p-5">
                    <h5 class="card-title">William Dawson</h5>
                    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                    <a href="#" class="btn btn-block btn-secondary">
                        <i class="fa fa-envelope"></i>
                    </a>
                </div>
            </div>
        </div>
        <div class="col">
            <div class="card">
                <img class="card-img-top" src="{{ asset("assets/app/media/img/users/300_4.jpg") }}" alt="Card image cap">
                <div class="card-block p-5">
                    <h5 class="card-title">Philip A. Garrison</h5>
                    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                    <a href="#" class="btn btn-block btn-secondary">
                        <i class="fa fa-github"></i>
                    </a>
                </div>
            </div>
        </div>
        <div class="col">
            <div class="card">
                <img class="card-img-top" src="{{ asset("assets/app/media/img/users/300_6.jpg") }}" alt="Card image cap">
                <div class="card-block p-5">
                    <h5 class="card-title">Donn A. Vargas</h5>
                    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                    <a href="#" class="btn btn-block btn-secondary">
                        <i class="fa fa-twitter"></i>
                    </a>
                </div>
            </div>
        </div>
        <div class="col">
            <div class="card">
                <img class="card-img-top" src="{{ asset("assets/app/media/img/users/300_7.jpg") }}" alt="Card image cap">
                <div class="card-block p-5">
                    <h5 class="card-title">Fred Cameron</h5>
                    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                    <a href="#" class="btn btn-block btn-success">Steem Profile</a>
                </div>
            </div>
        </div>
    </div>
@endsection