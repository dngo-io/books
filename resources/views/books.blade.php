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

@endsection
@section("content")
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
            @include("layout.partials.copyright-alert")
            <nav aria-label="Search result pagination">
                {{ $paginate->render('pagination::bootstrap-4') }}
                Total {{ $total }} {{ str_plural('book', $total)}} found
            </nav>
            <hr>
            <div class="row">
                <div class="card-columns">
                    @foreach ($books as $book)
                        <div class="card mb-5">
                            <div class="card-header text-center bg-secondary">
                                {{ $book->getCollection() }}
                            </div>
                            <img class="card-img-top" src="{{ $book->getCover() }}" alt="{{ $book->getName() }} Cover Image">
                            <div class="card-body">
                                <h6 class="card-title"><a href="{{ url('book') }}/{{ $book->getId() }}" class="m-link">{{ $book->getName() }}</a></h6>
                                <p class="card-text">by <i>{{ $book->getAuthor()->getName() }}</i></p>
                            </div>
                            <ul class="list-group list-group-flush">
                                <li class="list-group-item">{{ config("app.languages.{$book->getLanguage()}") }}</li>
                            </ul>
                            <div class="card-body text-center bg-secondary">
                                <a href="{{ url("book/{$book->getId()}") }}" class="btn btn-outline-brand m-btn m-btn--outline-2x">More</a>
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