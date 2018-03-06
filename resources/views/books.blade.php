@extends("layout.page")
@section("title", "Books")
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
                        <input type="text" class="form-control m-input" placeholder="Type...">
                    </div>
                </div>
            </div>
            <div class="m-portlet m-portlet--mobile">
                <div class="m-portlet__head">
                    <div class="m-portlet__head-caption">
                        <div class="m-portlet__head-title">
                            <h3 class="m-portlet__head-text">
                                Narrow by Tags
                            </h3>
                        </div>
                    </div>
                </div>
                <div class="m-portlet__body">
                    <div class="m-checkbox-list">
                        @foreach($categories as $category)
                            <label class="m-checkbox">
                                <input type="checkbox" name="category[]" value="{{ $category->getId() }}" checked> {{ $category->getName() }}
                                <span></span>
                            </label>
                        @endforeach
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
                            <input type="checkbox" name="language[]" checked value="{{ $key }}"> {{ $language }}
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
            </nav>
            <div class="row">
                @foreach ($books as $book)
                    <div class="col-md-4 mb-5">
                        <div class="m-portlet m-portlet--bordered m-portlet--rounded  m-portlet--full-height">
                            <div class="m-portlet__body p-0">
                                <div class="card no-border">
                                    <img class="card-img-top" src="{{ $book->getCover() }}" alt="{{ $book->getName() }} Cover Image">
                                    <div class="card-body">
                                        <h6 class="card-title">{{ $book->getName() }}</h6>
                                        <p class="card-text">in {{ $book->getYear() }} by <a href="{{ url("author/{$book->getAuthor()->getId()}") }}" class="m-link">{{ $book->getAuthor()->getName() }}</a></p>
                                    </div>
                                    <ul class="list-group list-group-flush">
                                        <li class="list-group-item">2131 {{ str_plural('Contribution', 21312) }}</li>
                                        <li class="list-group-item">ISBN {{ $book->getIsbn() }}</li>
                                        <li class="list-group-item">{{ format_date($book->getReleaseDate()) }}</li>
                                    </ul>
                                    <div class="card-body text-center">
                                        <a href="{{ url("book/{$book->getId()}") }}" class="btn btn-outline-brand m-btn m-btn--outline-2x">More</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
            <nav aria-label="Search result pagination">
                {{ $paginate->render('pagination::bootstrap-4') }}
            </nav>

        </div>
    </div>
@endsection