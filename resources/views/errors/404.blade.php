@extends("layout.metronic")
@section("title","404 Not Found")
@section("page")
    <div class="m-grid m-grid--hor m-grid--root m-page">
        <div class="m-grid__item m-grid__item--fluid m-grid m-error-4" style="background-image: url({{ asset("assets/app/media/img/error/bg4.jpg") }});">
            <div class="m-error_container">
                <h1 class="m-error_number">
                    404
                </h1>
                <p class="m-error_title">
                    ERROR
                </p>
                <p class="m-error_description">
                    Nothing left to do here.
                    <br>
                    <a href="{{ url("/") }}" class="mt-5 btn btn-lg m-btn btn-success">
                        TAKE ME BACK HOME
                    </a>
                </p>
            </div>
        </div>
    </div>
@endsection