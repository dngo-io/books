@extends("layout.page")
@section("title", "Feed")
@section("content")
    <div class="row">
        <div class="col-md-12">
            @if($count > 0)
                <div class="m-portlet m--bg-secondary m-portlet--bordered-semi">
                    <div class="m-portlet__head">
                        <div class="m-portlet__head-caption">
                            <div class="m-portlet__head-title">
                            <span class="m-portlet__head-icon m--hide">
                                <i class="la la-gear"></i>
                            </span>
                                <h3 class="m-portlet__head-text">
                                    Feed
                                </h3>
                            </div>
                        </div>
                    </div>
                    <div class="m-portlet__body">
                        <nav aria-label="Search result pagination">
                            {{ $pagination->render('pagination::bootstrap-4') }}
                            Total {{ $total }} {{ str_plural('book', $total)}} found
                        </nav>
                        <hr>
                        <div class="m-widget5">
                            @foreach($content as $item)
                                <div class="m-widget5__item">
                                    <div class="m-widget5__pic">
                                        <img class="m-widget7__img" src="{{ url($item->getBook()->getCover()) }}" width="100" alt="{{ $item->getBook()->getName() }}">
                                    </div>
                                    <div class="m-widget5__content">
                                        <h4 class="m-widget5__title">
                                            <a href="{{ url("listen/{$item->getId()}") }}" title="{{ $item->getName() }}" class="m-link">
                                                {{ $item->getName() }}
                                            </a>
                                        </h4>
                                        <span class="m-widget5__desc">
                                        <blockquote class="blockquote blockquote-reverse">
                                            <p class="mb-0">
                                                <i class="fa fa-book"></i>
                                                <a href="{{ url("book/{$item->getBook()->getId()}") }}" class="m-link m-link--dark" title="{{ $item->getBook()->getName() }}">
                                                    {{ str_limit($item->getBook()->getName(), 80, '...') }}
                                                </a>
                                            </p>
                                            <footer class="blockquote-footer">By
                                                <cite title="{{ $item->getBook()->getAuthor()->getName() }}">
                                                    <span>
                                                        {{ $item->getBook()->getAuthor()->getName() }}
                                                    </span>
                                                </cite>
                                                in
                                                <cite title="{{ $item->getBook()->getYear() }}">
                                                    {{ $item->getBook()->getYear() }}
                                                </cite>
                                            </footer>
                                        </blockquote>
                                            {{ str_limit(strip_tags(markdown($item->getBody())), 200, '...') }}
                                    </span>
                                        <div class="m-widget5__info">
                                            <span class="m-widget5__author">
                                                by
                                            </span>
                                            <span class="m-widget5__info-author-name">
                                                <a href="{{ url("user/{$item->getUser()->getAccount()}") }}" class="m-link">
                                                    {{ author($item->getUser()) }}
                                                </a>
                                            </span>
                                            <span class="m-widget5__info-label">
                                                on
                                            </span>
                                            <span class="m-widget5__info-date">
                                                {{ format_date($item->getCreatedAt()) }}
                                            </span>
                                        </div>
                                    </div>
                                    <div class="m-widget5__stats1 text-center pl-0">
                                        <a class="m-link" href="{{ url("book/{$item->getBook()->getId()}") }}">
                                            <span><i class="fa fa-3x fa-book"></i></span><br>
                                            <span>Book</span>
                                        </a>
                                    </div>
                                    <div class="m-widget5__stats2 text-center pl-0">
                                        <a class="m-link" href="{{ url("listen/{$item->getId()}") }}">
                                            <span><i class="fa fa-3x fa-play"></i></span><br>
                                            <span>Listen</span>
                                        </a>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                        <hr>
                        <nav aria-label="Search result pagination">
                            {{ $pagination->render('pagination::bootstrap-4') }}
                            Total {{ $total }} {{ str_plural('book', $total)}} found
                        </nav>
                    </div>
                </div>
            @else
                <div class="m-alert m-alert--outline m-alert--outline-2x alert alert-warning fade show" role="alert">
                    <strong>Warning!</strong> No matching record found.
                </div>
            @endif
        </div>
    </div>
@endsection