@extends("layout.page")
@section("title", "Contributors")
@section("content")
    <div class="row">
        <div class="col-md-12">
            @if($total > 0)
                <div class="m-portlet m--bg-secondary m-portlet--bordered-semi">
                    <div class="m-portlet__head">
                        <div class="m-portlet__head-caption">
                            <div class="m-portlet__head-title">
                                <span class="m-portlet__head-icon m--hide">
                                    <i class="la la-gear"></i>
                                </span>
                                <h3 class="m-portlet__head-text">
                                    Contributors
                                </h3>
                            </div>
                        </div>
                        <div class="m-portlet__head-tools">
                            <div class="col-xs-12 col-md-6 col-lg-4 pull-right">
                                <form action="{{ url("/contributors") }}" method="GET">
                                    <input name="account" class="form-control m-input m-input--air m-input--pill" placeholder="Search..." value="{{ $search }}" type="text">
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="m-portlet__body">
                        <nav aria-label="Search result pagination">
                            {{ $paginate->render('pagination::bootstrap-4') }}
                            Total {{ $total }} {{ str_plural('contributor', $total)}} found
                        </nav>
                        <hr>
                        <div class="m-widget5">
                            <div class="m-widget4">
                            @foreach($users as $item)
                                    <div class="m-widget4__item">
                                        <div class="m-widget4__img m-widget4__img--pic">
                                            <a href="{{ url("user/{$item->getAccount()}") }}">
                                                <img src="{{ get_steem_pp($item->getProfileImage()) }}" alt="{{ $item->getAccount() }}">
                                            </a>
                                        </div>
                                        <div class="m-widget4__info">
                                            <span class="m-widget4__title">
                                                <a href="{{ url("user/{$item->getAccount()}") }}" class="m-link">
                                                    {{ author($item) }}
                                                </a>
                                            </span>
                                            <br>
                                            <span class="m-widget4__sub">
                                                <strong>{{ $item->getName() }}</strong>, Member since {{ format_date($item->getCreatedAt()) }}
                                            </span>
                                        </div>
                                        <div class="m-widget4__ext d-none">
                                            <a href="#" class="m-btn m-btn--pill m-btn--hover-brand btn btn-sm btn-secondary">Follow</a>
                                        </div>
                                    </div>
                            @endforeach
                            </div>
                        </div>
                        <hr>
                        <nav aria-label="Search result pagination">
                            {{ $paginate->render('pagination::bootstrap-4') }}
                            Total {{ $total }} {{ str_plural('contributor', $total)}} found
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