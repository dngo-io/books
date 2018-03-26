@extends("layout.page")
@section("title", "Moderation")
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
                                    Approved but non sent to steem
                                </h3>
                            </div>
                        </div>
                    </div>
                    <div class="m-portlet__body">
                        <nav aria-label="Search result pagination">
                            {{ $paginate->render('pagination::bootstrap-4') }}
                        </nav>
                        <br>
                        <div class="fc fc-unthemed fc-ltr">
                            <div class="fc-view-container">
                                <div class="fc-view fc-listWeek-view fc-list-view fc-widget-content">
                                    <div class="fc-scroller">
                                        <table class="fc-list-table ">
                                            <tbody>

                                            @foreach($content as $item)
                                                <tr>
                                                    <td> {{ json_encode($item->getRequest()) }}</td>
                                                    <td> {{ json_encode($item->getResponse()) }}</td>
                                                    <td> @if ($item->getBookAudio()) {{$item->getBookAudio()->getName()}} @endif</td>
                                                </tr>
                                            @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <br>
                        <nav aria-label="Search result pagination">
                            {{ $paginate->render('pagination::bootstrap-4') }}
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