@extends("layout")
@section("content")
    <div id="root_index">
        <div id="root_layer">
            <div id="home_title" class="text-center m--font-light">
                <h1 class="presentation-title">{{ config("app.name") }}</h1>
                <h3>Watch out! Here the slogan comes...</h3>
                <p class="lead">We let you revoice public e-books to broadcast with your voice. Join the
                    <span class="m--font-accent">community</span>, do a <span class="m--font-accent">favour</span>, get <span class="m--font-accent">paid!</span></p>
                <a class="btn m-btn--pill m-btn--air btn-info btn-lg m-btn m-btn--custom" href="">Road Map</a>
                &nbsp;
                <a class="btn m-btn--pill m-btn--air btn-danger btn-lg m-btn m-btn--custom" href="">Join now!</a>
                <p>Not a Steemian yet? Join <a href="{{ url("https://signup.steemit.com/") }}" class="m-link m--font-boldest m-link--success">Steemit</a></p>
            </div>
        </div>
    </div>
@endsection