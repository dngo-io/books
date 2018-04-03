@extends("layout.metronic")
@section("title","Login")
@section("page")
    <div class="m-grid m-grid--hor m-grid--root m-page">
        <div class="m-grid__item m-grid__item--fluid m-grid  m-error-3" style="background-image: url(../../../assets/app/media/img//error/bg3.jpg);">
            <div class="m-error_container">
                <span class="m-error_number">
                    <h1>
                        Wait!
                    </h1>
                </span>
                <p class="m-error_title m--font-light shadow-dark">
                    You are about to leave {{ config("app.name") }}!
                </p>
                <p class="m-error_subtitle shadow-light">
                    We are using Steem Connect v2 to authenticate our Steemians.
                </p>
                <p class="m-error_description">
                    <span class="shadow-light">
                        This website uses cookies to ensure you get the best experience on our website.
                    </span>
                    <br>
                    <a href="{{ url("login/redirect") }}" class="btn btn-lg btn-success mt-5">I agree, Login</a>
                <a href="{{ url("https://discord.gg/Hvb8vpq") }}" class="btn btn-lg btn-brand mt-5">Discord Channel</a>
                </p>
            </div>
        </div>
    </div>
@endsection