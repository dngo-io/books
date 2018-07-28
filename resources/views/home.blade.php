@extends("layout.page")
@section("title", "Home")
@section("content")
    <div class="masthead">
        <div class="intro-body text-center m--font-light">
            <h1 class="presentation-title mt-5">
                <img src="{{ asset("assets/custom/img/dngo-negative-hq-logo.png") }}" alt="{{ config("app.name") }}" style="width:50%">
            </h1>
            <h3>The Future of Social Impact</h3>
            <br>
            <iframe width="560" height="315" src="https://www.youtube.com/embed/3xXX_I33hwg" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen></iframe>
            <br>
            <p class="lead m-5">
                Join Us! Together we create world’s <span class="m--font-accent">first blockchain-based</span> audiobook archive.
            </p>
            <hr class="mt-5">
            <a class="mt-3 btn m-btn--pill m-btn--air btn-info btn-lg m-btn m-btn--custom" href="{{ asset("dngo-documents/dngo-and-dngo-books-bluepaper.pdf") }}">Bluepaper</a>
            <span class="d-none d-sm-inline">&nbsp;</span>
            <a class="mt-3 btn m-btn--pill m-btn--air btn-danger btn-lg m-btn m-btn--custom" href="{{ url("/login") }}">Join now!</a>
            <p class="m-5">Not a Steemian yet? Join <a href="{{ url("https://signup.steemit.com/") }}" class="m-link m--font-boldest m-link--success">Steemit!</a></p>
        </div>
    </div>
@endsection