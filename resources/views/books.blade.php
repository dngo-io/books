@extends("layout.page")
@section("title", "Books")
@section("script")
    $("#year-slider").ionRangeSlider({
        type: "double",
        min: 1900,
        max: 2018,
        from: {{ $chosen['year'][0] }},
        to: {{ $chosen['year'][1] }},
        grid: true,
        input: 'year'
    });

    var config = {"language" : "en-US"};
    console.log(config);
    dngo  = new Dngo(config, "feed");
    dngo.init();
@endsection
@section("content")"
    <div class="row">
        <div class="col-md-3">
            {{ Form::open(array('method' => 'GET', 'id' => 'book-filters')) }}
            <div class="m-portlet m-portlet--mobile">
                <div class="m-portlet__head">
                    <div class="m-portlet__head-caption">
                        <div class="m-portlet__head-title">
                            <h3 class="m-portlet__head-text">
                                Narrow by Title
                            </h3>
                        </div>
                    </div>
                </div>
                <div class="m-portlet__body">
                    <div class="m-checkbox-list">
                        <input type="text" name="name" class="form-control m-input" value="{{ $chosen['name'] }}" placeholder="Type...">
                    </div>
                </div>
            </div>
            <div class="m-portlet m-portlet--mobile">
                <div class="m-portlet__head">
                    <div class="m-portlet__head-caption">
                        <div class="m-portlet__head-title">
                            <h3 class="m-portlet__head-text">
                                Narrow by Year Range
                            </h3>
                        </div>
                    </div>
                </div>
                <div class="m-portlet__body">
                    <input id="year-slider" name="year">
                </div>
            </div>
            <div class="m-portlet m-portlet--mobile">
                <div class="m-portlet__head">
                    <div class="m-portlet__head-caption">
                        <div class="m-portlet__head-title">
                            <h3 class="m-portlet__head-text">
                                Narrow by Language
                            </h3>
                        </div>
                    </div>
                </div>
                <div class="m-portlet__body">
                    <div class="m-checkbox-list">
                        @foreach(config('app.languages') as $key => $language)
                        <label class="m-checkbox">
                            <input type="checkbox" name="language[]" value="{{ $key }}" {{ ($chosen['language']) === true || in_array($key, $chosen['language']) ? 'checked':'' }}> {{ $language }}
                            <span></span>
                        </label>
                        @endforeach
                    </div>
                </div>
            </div>
            <div class="m-portlet m-portlet--mobile">
                <div class="m-portlet__body">
                    <div class="m-checkbox-list">
                       <input class="btn btn-dark btn-block" type="submit" value="search"/>
                    </div>
                </div>
            </div>
            {{ Form::close() }}
        </div>
        <div class="col-md-9">
            <nav aria-label="Search result pagination">
                {{ $paginate->render('pagination::bootstrap-4') }}
                Total {{ $total }} {{ str_plural('book', $total)}} found
            </nav>
            <hr>
            <div class="row">
                {{--<div class="card-columns">--}}
                    {{--@foreach ($books as $book)--}}
                        {{--<div class="card mb-5">--}}
                            {{--<div class="card-header text-center bg-secondary">--}}
                                {{--{{ $book->getCollection() }}--}}
                            {{--</div>--}}
                            {{--<img class="card-img-top" src="{{ $book->getCover() }}" alt="{{ $book->getName() }} Cover Image">--}}
                            {{--<div class="card-body">--}}
                                {{--<h6 class="card-title read-this"><a href="{{ url('book') }}/{{ $book->getId() }}" class="m-link">{{ $book->getName() }}</a></h6>--}}
                                {{--<p class="card-text">by <a href="{{ url("author/{$book->getAuthor()->getId()}") }}" class="m-link">{{ $book->getAuthor()->getName() }}</a></p>--}}
                            {{--</div>--}}
                            {{--<ul class="list-group list-group-flush">--}}
                                {{--<li class="list-group-item">{{ config("app.languages.{$book->getLanguage()}") }}</li>--}}
                            {{--</ul>--}}
                            {{--<div class="card-body text-center bg-secondary">--}}
                                {{--<a href="{{ url("book/{$book->getId()}") }}" class="btn btn-outline-brand m-btn m-btn--outline-2x">More</a>--}}
                            {{--</div>--}}
                        {{--</div>--}}
                    {{--@endforeach--}}
                {{--</div>--}}
                <div class="m-widget5">
                    @foreach($books as $book)
                        <div class="m-widget5__item">
                            <div class="m-widget5__pic">
                                <img class="m-widget7__img" src="{{ url($book->getCover() ) }}" width="100" alt="{{ $book->getName() }}">
                            </div>
                            <div class="m-widget5__content">
                                <h4 class="m-widget5__title">
                                    <a href="{{ url("book/{$book->getId()}") }}" title="{{ $book->getName() }}" class="m-link read-this">
                                        {{ $book->getName() }}
                                    </a>
                                </h4>
                                        <span class="m-widget5__desc">
                                        <blockquote class="blockquote blockquote-reverse">
                                            <p class="mb-0">
                                                <i class="fa fa-book"></i>
                                                <a href="{{ url("book/{$book->getId()}") }}" class="m-link m-link--dark" title="{{ $book->getName() }}">
                                                    {{ str_limit($book->getName(), 80, '...') }}
                                                </a>
                                            </p>
                                            <footer class="blockquote-footer">By
                                                <cite title="{{ $book->getAuthor()->getName() }}">
                                                    <span>
                                                        {{ $book->getAuthor()->getName() }}
                                                    </span>
                                                </cite>
                                                in
                                                <cite title="{{ $book->getYear() }}">
                                                    {{ $book->getYear() }}
                                                </cite>
                                            </footer>
                                        </blockquote>
                                        {{ str_limit(strip_tags(markdown($book->getDescription())), 200, '...') }}
                                    </span>
                            </div>
                            <div class="m-widget5__stats1 text-center pl-0">
                                <a class="m-link" href="{{ url("book/{$book->getId()}") }}">
                                    <span><i class="fa fa-3x fa-book"></i></span><br>
                                    <span>Detail</span>
                                </a>
                            </div>
                        </div>
                    @endforeach
                </div>

            </div>
            <hr>
            <nav aria-label="Search result pagination">
                {{ $paginate->render('pagination::bootstrap-4') }}
                Total {{ $total }} {{ str_plural('book', $total)}} found
            </nav>
        </div>
    </div>
@endsection