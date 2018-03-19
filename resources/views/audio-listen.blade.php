@extends("layout.page")
@section("title", $data['book']['name'].' - Chapter #'.$data['audio']['chapter'].' by '.$data['author']['name'])
@section("script")
    Amplitude.init({
    "songs": [
    {
    "name": "{{ $data['audio']['name'] }}",
    "artist": "{{ $data['author']['name'] }}",
    "album": "{{ $data['book']['name'] }}",
    "url": "{{ $data['audio']['file'] }}"
    }
    ]
    });
    new Clipboard('[data-clipboard=true]').on('success', function(e) {
    e.clearSelection();
    alert('Copied!');
    });
@endsection
@section("content")
    <div class="row">
        <div class="col-md-12 col-sm-12">
            <div class="m-portlet m-portlet--bordered bg-secondary">
                <div class="m-portlet__body">
                    @include("layout.partials.audio-player")
                </div>
            </div>
            <div class="m-nav-grid mt-0 mb-3">
                <div class="m-nav-grid__row">
                    <a href="#" class="m-nav-grid__item">
                        <i class="m-nav-grid__icon fa fa-thumbs-o-up"></i>
                        <span class="m-nav-grid__text m--font-metal">Up Vote</span>
                    </a>
                    <a href="#" class="m-nav-grid__item">
                        <i class="m-nav-grid__icon fa fa-comment-o"></i>
                        <span class="m-nav-grid__text m--font-metal">Comment</span>
                    </a>
                    <a href="#" class="m-nav-grid__item" data-clipboard="true" data-clipboard-target="#embed-code">
                        <i class="m-nav-grid__icon fa fa-volume-up"></i>
                        <span class="m-nav-grid__text m--font-metal">Embed</span>
                    </a>
                    <a href="#" class="m-nav-grid__item">
                        <i class="m-nav-grid__icon fa fa-microphone"></i>
                        <span class="m-nav-grid__text m--font-metal">Read</span>
                    </a>
                </div>
            </div>
        </div>
        <div class="col-md-12">
            <div class="m-portlet  m-portlet--tabs">
                <div class="m-portlet__head">
                    <div class="m-portlet__head-caption">
                        <div class="m-portlet__head-title">
                            <h3 class="m-portlet__head-text">
                                Comments
                            </h3>
                        </div>
                    </div>
                    <div class="m-portlet__head-tools">
                        <ul class="nav nav-tabs m-tabs m-tabs-line m-tabs-line--success m-tabs-line--right" role="tablist">
                            <li class="nav-item m-tabs__item">
                                <a class="nav-link m-tabs__link">
                                    <i class="fa fa-chevron-up"></i>
                                    Up Vote
                                </a>
                            </li>
                            <li class="nav-item dropdown m-tabs__item">
                                <a class="nav-link m-tabs__link" href="#" ><i class="fa fa-comment-o"></i> Comment</a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="m-portlet__body">
                    <div class="media">
                        <img class="mr-3 m--img-rounded" src="{{ asset("assets/app/media/img/users/100_2.jpg") }}" width="64" alt="Generic placeholder image">
                        <div class="media-body">
                            <h5 class="mt-0">Media heading</h5>
                            Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin. Cras purus odio, vestibulum in vulputate at, tempus viverra turpis. Fusce condimentum nunc ac nisi vulputate fringilla. Donec lacinia congue felis in faucibus.
                            <p>
                                <i class="fa fa-chevron-up"></i> $0.00
                                <a href="#" class="ml-5 m-link">Reply</a>
                            </p>
                            <div class="media mt-3">
                                <a class="pr-3" href="#">
                                    <img src="{{ asset("assets/app/media/img/users/100_1.jpg") }}" class="m--img-rounded" width="64" alt="Generic placeholder image">
                                </a>
                                <div class="media-body">
                                    <h5 class="mt-0">Media heading</h5>
                                    Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin. Cras purus odio, vestibulum in vulputate at, tempus viverra turpis. Fusce condimentum nunc ac nisi vulputate fringilla. Donec lacinia congue felis in faucibus.
                                    <p>
                                        <i class="fa fa-chevron-up m--font-success"></i> $0.01
                                        <a href="#" class="ml-5 m-link">Reply</a>
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="media">
                        <img class="mr-3 m--img-rounded" src="{{ asset("assets/app/media/img/users/100_3.jpg") }}" width="64" alt="Generic placeholder image">
                        <div class="media-body">
                            <h5 class="mt-0">Media heading</h5>
                            Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin. Cras purus odio, vestibulum in vulputate at, tempus viverra turpis. Fusce condimentum nunc ac nisi vulputate fringilla. Donec lacinia congue felis in faucibus.
                            <p>
                                <i class="fa fa-chevron-up"></i> $0.00
                                <a href="#" class="ml-5 m-link">Reply</a>
                            </p>
                        </div>
                    </div>
                    <div class="media">
                        <img class="mr-3 m--img-rounded" src="{{ asset("assets/app/media/img/users/100_4.jpg") }}" width="64" alt="Generic placeholder image">
                        <div class="media-body">
                            <h5 class="mt-0">Media heading</h5>
                            Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin. Cras purus odio, vestibulum in vulputate at, tempus viverra turpis. Fusce condimentum nunc ac nisi vulputate fringilla. Donec lacinia congue felis in faucibus.
                            <p>
                                <i class="fa fa-chevron-up"></i> $0.00
                                <a href="#" class="ml-5 m-link">Reply</a>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <textarea id="embed-code" style="width: 0;height: 0; border: 0; opacity: 0"><iframe src="{{ url("/listen/embed/{$id}") }}" style="border:0px #ffffff none;" name="DNGOBooks" scrolling="no" frameborder="0" marginheight="0px" marginwidth="0px" height="200px" width="600px" allowfullscreen></iframe></textarea>
@endsection