<div class="m-list-search__results">
    @if((count($books) + count($users)) === 0)
        <span class="m-list-search__result-message">No record found</span>
    @else
    @if(count($books) > 0)
            <span class="m-list-search__result-category m-list-search__result-category--first">
            Books
        </span>
            @foreach($books as $book)
                <a href="{{ url("/book/{$book['id']}") }}" class="m-list-search__result-item">
                    <span class="m-list-search__result-item-icon"><i class="fa fa-book"></i></span>
                    <span class="m-list-search__result-item-text">{{ $book['name'] }}</span>
                </a>
            @endforeach
        @endif
        @if(count($users) > 0)
            <span class="m-list-search__result-category">Users</span>
            @foreach($users as $user)
                <a href="{{ url("/user/{$user['account']}") }}" class="m-list-search__result-item">
                    <span class="m-list-search__result-item-pic"><img class="m--img-rounded" src="{{ asset($user['profileImage']) }}" title="{{ $user['name'] }}"/></span>
                    <span class="m-list-search__result-item-text">{{ $user['name'] }}<br><small>{{ '@'.$user['account'] }}</small></span>
                </a>
            @endforeach
        @endif
        <span class="m-list-search__result-category">
        Help
    </span>
    <a href="{{ url(config("steem.rules")) }}" class="m-list-search__result-item">
        <span class="m-list-search__result-item-icon"><i class="fa fa-balance-scale"></i></span>
        <span class="m-list-search__result-item-text">Rules</span>
    </a>
    <a href="{{ url(config("steem.how_to")) }}" class="m-list-search__result-item">
        <span class="m-list-search__result-item-icon"><i class="fa fa-question-circle"></i></span>
        <span class="m-list-search__result-item-text">How to Contribute?</span>
    </a>
    @endif
</div>