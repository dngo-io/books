<!-- begin::Footer -->
<footer class="m-grid__item  m-footer">
    <div class="m-container m-container--responsive m-container--xxl m-container--full-height">
        <div class="m-stack m-stack--flex-tablet-and-mobile m-stack--ver m-stack--desktop">
            <div class="m-stack__item m-stack__item--left m-stack__item--middle m-stack__item--last">
                <span class="m-footer__copyright">
                    {{ date("Y") }} &copy; {{ config("app.name") }}
                </span>
            </div>
            <div class="m-stack__item m-stack__item--right m-stack__item--middle m-stack__item--first">
                <ul class="m-footer__nav m-nav m-nav--inline m--pull-right">
                    @if (Auth::guest())
                    <li class="m-nav__item">
                        <a href="{{ url("/login") }}" class="m-nav__link">
                        <span class="m-nav__link-text">
                            Login
                        </span>
                        </a>
                    </li>
                    @endif
                    <li class="m-nav__item">
                        <a href="{{ url("/about") }}" class="m-nav__link">
                            <span class="m-nav__link-text">
                                About
                            </span>
                        </a>
                    </li>
                    <li class="m-nav__item">
                        <a href="{{ url("https://discord.gg/Hvb8vpq") }}" class="m-nav__link">
                            <span class="m-nav__link-text">
                                Discord
                            </span>
                        </a>
                    </li>
                    <li class="m-nav__item">
                        <a href="{{ url("/road-map") }}" class="m-nav__link">
                            <span class="m-nav__link-text">
                                Road Map
                            </span>
                        </a>
                    </li>
                    <li class="m-nav__item">
                        <a href="{{ asset("dngo-documents/dngo-and-dngo-books-bluepaper.pdf") }}" class="m-nav__link">
                        <span class="m-nav__link-text">
                            Bluepaper
                        </span>
                        </a>
                    </li>
                    <li class="m-nav__item">
                        <a href="{{ url(config("steem.rules")) }}" class="m-nav__link">
                            <span class="m-nav__link-text">
                                Rules
                            </span>
                        </a>
                    </li>
                    <li class="m-nav__item">
                        <a href="{{ url(config("steem.how_to")) }}" class="m-nav__link">
                            <span class="m-nav__link-text">
                                How to Contribute?
                            </span>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</footer>
<!-- end::Footer -->