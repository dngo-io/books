@extends("layout.page")
@section("title", $book->getName())
@section("content")
    <div class="row">
        <div class="col-md-12">
            <div class="m-portlet m-portlet--skin-dark m-portlet--bordered-semi">
                <div class="m-portlet__head">
                    <div class="m-portlet__head-caption">
                        <div class="m-portlet__head-title">
                            <h3 class="m-portlet__head-text">
                                {{ $book->getName() }}
                            </h3>
                        </div>
                    </div>
                    <div class="m-portlet__head-tools"></div>
                </div>
                <div class="m-portlet__body">
                    <blockquote class="blockquote">
                        <p>
                            {{ $book->getDescription() }}
                        </p>
                        <footer class="blockquote-footer">{{ format_date($book->getReleaseDate()) }}</footer>
                    </blockquote>
                </div>
            </div>
        </div>
        <div class="col-md-8">
            <div class="m-portlet m-portlet--full-height">
                <div class="m-portlet__head">
                    <div class="m-portlet__head-caption">
                        <div class="m-portlet__head-title">
                            <h3 class="m-portlet__head-text">
                                Book Details
                            </h3>
                        </div>
                    </div>
                </div>
                <div class="m-portlet__body">
                    <div class="alert alert-warning text-justify" role="alert">
                        <strong>Attention!</strong>
                        This eBook is for the use of anyone anywhere at no cost and with
                        almost no restrictions whatsoever.  You may copy it, give it away or
                        re-use it under the terms of the Project Gutenberg License included
                        with this eBook or online at
                        <a href="www.gutenberg.org/license" class="m-link m--font-light">www.gutenberg.org/license</a>.
                    </div>
                    <div class="row">
                        <div class="col-md-3">
                            <img src="{{ $book->getCover() }}" alt="{{ $book->getName() }}" class="img-fluid img-rounded img-thumbnail">
                        </div>
                        <div class="col-md-9">
                            <table class="table table-inverse col-md-9">
                                <tbody>
                                    <tr>
                                        <th scope="row">EBook</th>
                                        <td>#56641</td>
                                    </tr>
                                    <tr>
                                        <th scope="row">Commentator</th>
                                        <td>Löwenberg, J.</td>
                                    </tr>
                                    <tr>
                                        <th scope="row">Illustrator</th>
                                        <td>Konewka, Paul, 1840-1871</td>
                                    </tr>
                                    <tr>
                                        <th scope="row">Language</th>
                                        <td>{{ $book->getLanguage() }}</td>
                                    </tr>
                                    <tr>
                                        <th scope="row">EBook-No.</th>
                                        <td>56641</td>
                                    </tr>
                                    <tr>
                                        <th scope="row">Copyright Status</th>
                                        <td>Public domain in the USA</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="m--space-30"></div>
                    <a href="#" class="btn btn-block btn-lg btn-accent m-btn m-btn--custom m-btn--outline-2x m-btn--uppercase">Contribute!</a>
                    <div class="m--space-30"></div>
                    <p class="lead text-justify d-none">
                        {{ $book->getDescription() }}
                    </p>
                    <div class="m--space-30 text-center d-none">
                        <a href="#" class="btn m-btn--pill m-btn--air btn-outline-dark m-btn m-btn--custom m-btn--outline-2x">
                            <i class="fa fa-wikipedia-w"></i> Wikipedia
                        </a>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="m-portlet">
                <div class="m-portlet__head">
                    <div class="m-portlet__head-caption">
                        <div class="m-portlet__head-title">
                            <h3 class="m-portlet__head-text">
                                Download
                            </h3>
                        </div>
                    </div>
                    <div class="m-portlet__head-tools">
                    </div>
                </div>
                <div class="m-portlet__body">
                    <div class="m-widget4">
                        @foreach(downloadable($book->getGutenbergFiles()) as $item)
                            <div class="m-widget4__item">
                                <div class="m-widget4__img m-widget4__img--icon">
                                    <img src="{{ asset("assets/app/media/img/files/{$item['type']}.svg") }}" alt="{{ $item['type'] }}">
                                </div>
                                <div class="m-widget4__info">
                                    <span class="m-widget4__text">
                                    {{ $item['file'] }}
                                    </span>
                                </div>
                                <div class="m-widget4__ext">
                                    <a href="{{ url($item['path']) }}" class="m-widget4__icon">
                                        <i class="la la-download"></i>
                                    </a>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-12">
            <div class="progress mt-5" style="height: 1px">
                <div class="progress-bar bg-success" role="progressbar" style="width: 36.36%" aria-valuenow="36.36" aria-valuemin="0" aria-valuemax="100">
                </div>
                <div class="progress-bar bg-warning" role="progressbar" style="width: 9.09%" aria-valuenow="9.09" aria-valuemin="0" aria-valuemax="100">
                </div>
                <div class="progress-bar bg-danger" role="progressbar" style="width: 54.54%" aria-valuenow="54.54" aria-valuemin="0" aria-valuemax="100">
                </div>
            </div>
        </div>
        <div class="col-md-12">
            <div class="m-portlet">
                <div class="m-portlet__body m-portlet__body--no-padding">
                    <div class="row m-row--no-padding m-row--col-separator-xl">
                        <div class="col-md-12 col-lg-12 col-xl-4">
                            <div class="m-widget1">
                                <div class="m-widget1__item">
                                    <div class="row m-row--no-padding align-items-center">
                                        <div class="col">
                                            <h3 class="m-widget1__title">Contributor</h3>
                                            <span class="m-widget1__desc">%1.2 of {{ config("app.name") }} contributors</span>
                                        </div>
                                        <div class="col m--align-right">
                                            <span class="m-widget1__number m--font-dark">17</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="m-widget1__item">
                                    <div class="row m-row--no-padding align-items-center">
                                        <div class="col">
                                            <h3 class="m-widget1__title">Length</h3>
                                            <span class="m-widget1__desc">Voice length in minutes</span>
                                        </div>
                                        <div class="col m--align-right">
                                            <span class="m-widget1__number m--font-dark">45:13</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="m-widget1__item">
                                    <div class="row m-row--no-padding align-items-center">
                                        <div class="col">
                                            <h3 class="m-widget1__title">Chapters</h3>
                                            <span class="m-widget1__desc">26.351 Characters</span>
                                        </div>
                                        <div class="col m--align-right">
                                            <span class="m-widget1__number m--font-dark">11</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12 col-lg-12 col-xl-4">
                            <div class="m-widget1">
                                <div class="m-widget1__item">
                                    <div class="row m-row--no-padding align-items-center">
                                        <div class="col">
                                            <h3 class="m-widget1__title">Voiced</h3>
                                            <span class="m-widget1__desc">36.36% of chapters</span>
                                        </div>
                                        <div class="col m--align-right">
                                            <span class="m-widget1__number m--font-success">4</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="m-widget1__item">
                                    <div class="row m-row--no-padding align-items-center">
                                        <div class="col">
                                            <h3 class="m-widget1__title">Pending Approval</h3>
                                            <span class="m-widget1__desc">9.09% of chapters</span>
                                        </div>
                                        <div class="col m--align-right">
                                            <span class="m-widget1__number m--font-warning">1</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="m-widget1__item">
                                    <div class="row m-row--no-padding align-items-center">
                                        <div class="col">
                                            <h3 class="m-widget1__title">Voice Needed!</h3>
                                            <span class="m-widget1__desc">54.54% of chapters</span>
                                        </div>
                                        <div class="col m--align-right">
                                            <span class="m-widget1__number m--font-danger">6</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12 col-lg-12 col-xl-4">
                            <div class="m-widget1">
                                <div class="m-widget1__item">
                                    <div class="row m-row--no-padding align-items-center">
                                        <div class="col">
                                            <h3 class="m-widget1__title">Users</h3>
                                            <span class="m-widget1__desc">Current price 7346.08 USD</span>
                                        </div>
                                        <div class="col m--align-right">
                                            <span class="m-widget1__number m--font-dark">1.874 SBD</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="m-widget1__item">
                                    <div class="row m-row--no-padding align-items-center">
                                        <div class="col">
                                            <h3 class="m-widget1__title">Moderation</h3>
                                            <span class="m-widget1__desc">Current price 1352.40 USD</span>
                                        </div>
                                        <div class="col m--align-right">
                                            <span class="m-widget1__number m--font-dark">345 SBD</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="m-widget1__item">
                                    <div class="row m-row--no-padding align-items-center">
                                        <div class="col">
                                            <h3 class="m-widget1__title">{{ config("app.name") }}</h3>
                                            <span class="m-widget1__desc">Current price 5118.25 USD</span>
                                        </div>
                                        <div class="col m--align-right">
                                            <span class="m-widget1__number m--font-dark">1475 STEEM</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection