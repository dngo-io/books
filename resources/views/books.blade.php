@extends("layout.page")
@section("title", "Books")
@section("content")
    <div class="row">
        <div class="col-md-3">
            {{ Form::open(array('method' => 'GET')) }}
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
                        <label class="m-checkbox">
                            <input type="checkbox" checked> Horror
                            <span></span>
                        </label>
                        <label class="m-checkbox">
                            <input type="checkbox" checked> Adventure
                            <span></span>
                        </label>
                        <label class="m-checkbox">
                            <input type="checkbox" checked> Travel
                            <span></span>
                        </label>
                        <label class="m-checkbox">
                            <input type="checkbox" checked> Lorem
                            <span></span>
                        </label>
                        <label class="m-checkbox">
                            <input type="checkbox" checked> Ipsom
                            <span></span>
                        </label>
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
                <ul class="pagination">
                    <li class="page-item">
                        <a class="page-link" href="#" aria-label="Previous">
                            <span aria-hidden="true">&laquo;</span>
                            <span class="sr-only">Previous</span>
                        </a>
                    </li>
                    <li class="page-item"><a class="page-link" href="#">1</a></li>
                    <li class="page-item"><a class="page-link" href="#">2</a></li>
                    <li class="page-item"><a class="page-link" href="#">3</a></li>
                    <li class="page-item">
                        <a class="page-link" href="#" aria-label="Next">
                            <span aria-hidden="true">&raquo;</span>
                            <span class="sr-only">Next</span>
                        </a>
                    </li>
                </ul>
            </nav>
            {{ dump($obj) }}
            {{ dump($books) }}
            <div class="row">
                @for($i = 2; $i <= 10; $i++)
                    @php
                        $rand = rand(1,14);
                    @endphp
                    <div class="col-md-4 mb-5">
                        <div class="card">
                            <img class="card-img-top" src="http://via.placeholder.com/250x350" alt="Card image cap">
                            <div class="card-body">
                                <h6 class="card-title">A Tale of {{ $i }} Cities</h6>
                                <p class="card-text">by <a href="#" class="m-link">Hom Thanks</a>.</p>
                            </div>
                            <ul class="list-group list-group-flush">
                                <li class="list-group-item">{{ $rand }} {{ str_plural('Contribution', $rand) }}</li>
                                <li class="list-group-item">{{ date('M d, Y', strtotime('-'.rand(80, 130).'YEAR -'.rand(0,12).'MONTH -'.rand(0,30).'DAY')) }}</li>
                            </ul>
                            <div class="card-body text-center">
                                <a href="#" class="btn btn-outline-brand m-btn m-btn--outline-2x">More</a>
                            </div>
                        </div>
                    </div>
                @endfor
            </div>


            <nav aria-label="Search result pagination">
                <ul class="pagination">
                    <li class="page-item">
                        <a class="page-link" href="#" aria-label="Previous">
                            <span aria-hidden="true">&laquo;</span>
                            <span class="sr-only">Previous</span>
                        </a>
                    </li>
                    <li class="page-item"><a class="page-link" href="#">1</a></li>
                    <li class="page-item"><a class="page-link" href="#">2</a></li>
                    <li class="page-item"><a class="page-link" href="#">3</a></li>
                    <li class="page-item">
                        <a class="page-link" href="#" aria-label="Next">
                            <span aria-hidden="true">&raquo;</span>
                            <span class="sr-only">Next</span>
                        </a>
                    </li>
                </ul>
            </nav>

        </div>
    </div>
@endsection