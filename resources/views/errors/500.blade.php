@extends("layout.metronic")
@section("title","500 An Error Occurred")
@section("page")
    <div class="m-grid m-grid--hor m-grid--root m-page">
        <div class="m-grid__item m-grid__item--fluid m-grid  m-error-6" style="background-image: url({{ asset("assets/app/media/img/error/bg6.jpg") }});">
            <div class="m-error_container">
                <div class="m-error_subtitle m--font-light">
                    <h1>Oops...</h1>
                </div>
                <p class="m-error_description m--font-light">
                    Looks like something went wrong.
                    <br>
                    We will take a look!
                </p>
            </div>
        </div>
    </div>
@endsection