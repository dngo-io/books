@if(count($feed) > 0)
    <nav aria-label="Search result pagination">
        {{ $pagination->render('pagination::bootstrap-4') }}
    </nav>

    <div class="m-widget5">
        @foreach($feed as $item)
            <div class="m-widget5__item">
                <div class="m-widget5__pic">
                    <img class="m-widget7__img" src="{{ url($item->getBook()->getCover()) }}" width="100" alt="{{ $item->getBook()->getName() }}">
                </div>
                <div class="m-widget5__content">
                    <h4 class="m-widget5__title">
                        <a href="{{ url("listen/{$item->getId()}") }}" title="{{ $item->getName() }}" class="m-link m--font-warning">
                            <i class="fa fa-clock-o"></i>
                            {{ $item->getName() }}
                        </a>
                    </h4>
                    <span class="m-widget5__desc">
                        <blockquote class="blockquote blockquote-reverse">
                            <p class="mb-0">
                                <i class="fa fa-book"></i>
                                <a href="{{ url("book/{$item->getBook()->getId()}") }}" class="m-link m--font-dark">
                                    {{ $item->getBook()->getName() }}
                                </a>
                            </p>
                            <footer class="blockquote-footer">By
                                <cite title="{{ $item->getBook()->getAuthor()->getName() }}">
                                    {{ $item->getBook()->getAuthor()->getName() }}
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
                            <a href="{{ url("user/{$item->getUser()->getAccount()}") }}" class="m-link m--font-dark">
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
                    <a class="m-link m-link--dark" href="{{ url("book/{$item->getBook()->getId()}") }}">
                        <span><i class="fa fa-3x fa-book"></i></span><br>
                        <span>Book</span>
                    </a>
                </div>
                <div class="m-widget5__stats2 text-center pl-0">
                    <a class="m-link m-link--success" href="{{ url("listen/{$item->getId()}") }}">
                        <span><i class="fa fa-3x fa-play"></i></span><br>
                        <span>Listen</span>
                    </a>
                </div>
            </div>
        @endforeach
    </div>

    <nav aria-label="Search result pagination">
        {{ $pagination->render('pagination::bootstrap-4') }}
    </nav>
@else
    <p class="text-center">No pending contribution found</p>
@endif