@extends("layout.page")
@section("title", "Create a new post")
@section("script")
    function formatRepo(book)
    {
        if (book.loading)
            return book.text;

        var markup = "<div class='select2-result-repository clearfix'>" +
                     "<div class='select2-result-repository__meta'>" +
                     "<div class='select2-result-repository__title'><strong>" + book.name + "</strong></div>";
        if (book.description) {
            markup += "<div class='select2-result-repository__description'>ISBN: " + book.isbn + "</div>";
        }
        markup += "<div class='select2-result-repository__statistics'>" +
                  "<div class='select2-result-repository__forks'>" + book.author + "</div>" +
                  "<div class='select2-result-repository__stargazers'>" + book.page + " pages in <u>" + book.language + "</u></div>" +
                  "</div>" +
                  "</div></div>";
        return markup;
    }

    function formatRepoSelection(book) {
        if(book.name && book.author)
            return book.name + " - " + book.author;
        else
            return "Search for books";
    }

    $("#book").select2({
        placeholder: "Search for books",
        allowClear: true,
        ajax: {
            url: "{{ url("action/book") }}",
            dataType: 'json',
            delay: 500,
            data: function(params) {
                return {
                    name: params.term, // search term
                    page: params.page
                };
            },
            processResults: function(data) {
                return {
                    results: data
                };
            },
            cache: true
        },
        escapeMarkup: function(markup) {
            return markup;
        }, // let our custom formatter work
        minimumInputLength: 1,
        templateResult: formatRepo, // omitted for brevity, see the source of this page
        templateSelection: formatRepoSelection // omitted for brevity, see the source of this page
    });

    $("#tags").select2({
        placeholder: "Select an option",
        maximumSelectionLength: 2,
        allowClear: true,
        tags: true,
        ajax: {
            url: "{{ url("action/audio-tags") }}",
            dataType: 'json',
            delay: 500,
            data: function(params) {
                return {
                    name: params.term, // search term
                    page: params.page
                };
            },
            processResults: function(data) {
                return {
                    results: data
                };
            },
            cache: true
        }
    });
@endsection
@section("content")
    <div class="row">
        <div class="col-md-12">
            <div class="m-portlet m-portlet--tabs">
                <div class="m-portlet__head">
                    <div class="m-portlet__head-caption">
                        <div class="m-portlet__head-title">
                            <h3 class="m-portlet__head-text">Post</h3>
                        </div>
                    </div>
                    <div class="m-portlet__head-tools">
                    </div>
                </div>
                <form class="m-form m-form--label-align-right" action="{{ url("audio") }}" method="post" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    <div class="m-portlet__body">
                        <div class="row">
                            <div class="col-xl-10 offset-xl-1">
                                <div class="form-group m-form__group row">
                                    <label class="col-xl-3 col-lg-3 col-form-label">* Book:</label>
                                    <div class="col-xl-9 col-lg-9">
                                        <select class="form-control m-select2" id="book" name="param">
                                            <option></option>
                                        </select>
                                        <span class="m-form__help">Please choose a book</span>
                                    </div>
                                </div>
                                <div class="form-group m-form__group row">
                                    <label class="col-xl-3 col-lg-3 col-form-label">* Post Title:</label>
                                    <div class="col-xl-9 col-lg-9">
                                        <input type="text" name="title" class="form-control m-input" placeholder="" value="The Tale of Two Cities - Chapter 4 Audio Book">
                                        <span class="m-form__help">The title will be displayed as Steemit post title.</span>
                                    </div>
                                </div>
                                <div class="form-group m-form__group row">
                                    <label class="col-xl-3 col-lg-3 col-form-label">* Post Body:</label>
                                    <div class="col-xl-9 col-lg-9">
                                        <textarea name="content" class="form-control" data-provide="markdown" rows="15"></textarea>
                                        <span class="m-form__help">Appartment, suite, unit, building, floor, etc</span>
                                    </div>
                                </div>
                                <div class="form-group m-form__group row">
                                    <label class="col-xl-3 col-lg-3 col-form-label" for="audio">* Audio:</label>
                                    <div class="col-xl-9 col-lg-9">
                                        <div class="custom-file">
                                            <input type="file" class="custom-file-input" name="audio" id="audio">
                                            <label class="custom-file-label" for="customFile">Choose file</label>
                                        </div>
                                        <span class="m-form__help">Browse your local device and choose a file to upload</span>
                                    </div>
                                </div>
                                <div class="form-group m-form__group row">
                                    <label class="col-xl-3 col-lg-3 col-form-label">* Tags:</label>
                                    <div class="col-xl-9 col-lg-9">
                                        <select class="form-control m-select2" id="tags" name="tags" multiple></select>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="m-portlet__foot m-portlet__no-border m-portlet__foot--fit">
                        <div class="m-form__actions m-form__actions--solid text-center">
                            <button type="submit" class="btn btn-brand">Submit</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection