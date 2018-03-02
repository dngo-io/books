@extends("layout.page")
@section("title", "Post")
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
                    <input type="hidden" name="book" value="1">
                    <div class="m-portlet__body">
                        <div class="row">
                            <div class="col-xl-10 offset-xl-1">
                                <div class="m-form__section m-form__section--first">
                                    <div class="form-group m-form__group row">
                                        <label class="col-xl-3 col-lg-3 col-form-label">* Voiced Chapter:</label>
                                        <div class="col-xl-9 col-lg-9">
                                            <select class="form-control m-select2" id="m_select2_6" name="param">
                                                <option></option>
                                            </select>
                                            <span class="m-form__help">Please choose a book chapter to post</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="m-separator m-separator--dashed m-separator--lg"></div>

                                <div class="m-form__section">
                                    <div class="m-form__heading">
                                        <h3 class="m-form__heading-title">
                                            Proof of Work
                                            <i data-toggle="m-tooltip" data-width="auto" class="m-form__heading-help-icon flaticon-info" title="The form displayed below will be posted as Steemit post. Please make sure that it proves your work."></i>
                                        </h3>
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
                                        <label class="col-xl-3 col-lg-3 col-form-label">* Language:</label>
                                        <div class="col-xl-9 col-lg-9">
                                            <select class="form-control" name="language">
                                                <option value="en">English</option>
                                                <option value="de">Deutch</option>
                                                <option value="es">Spanish</option>
                                            </select>
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
                                            <select class="form-control m-select2" id="m_select2_9" name="tags" multiple>
                                                <option></option>
                                                <optgroup label="Alaskan/Hawaiian Time Zone">
                                                    <option value="AK">Alaska</option>
                                                    <option value="HI">Hawaii</option>
                                                </optgroup>
                                                <optgroup label="Pacific Time Zone">
                                                    <option value="CA">California</option>
                                                    <option value="NV" selected>Nevada</option>
                                                    <option value="OR">Oregon</option>
                                                    <option value="WA">Washington</option>
                                                </optgroup>
                                                <optgroup label="Mountain Time Zone">
                                                    <option value="AZ">Arizona</option>
                                                    <option value="CO">Colorado</option>
                                                    <option value="ID">Idaho</option>
                                                    <option value="MT">Montana</option>
                                                    <option value="NE">Nebraska</option>
                                                    <option value="NM">New Mexico</option>
                                                    <option value="ND">North Dakota</option>
                                                    <option value="UT">Utah</option>
                                                    <option value="WY">Wyoming</option>
                                                </optgroup>
                                                <optgroup label="Central Time Zone">
                                                    <option value="AL">Alabama</option>
                                                    <option value="AR">Arkansas</option>
                                                    <option value="IL">Illinois</option>
                                                    <option value="IA">Iowa</option>
                                                    <option value="KS">Kansas</option>
                                                    <option value="KY">Kentucky</option>
                                                    <option value="LA">Louisiana</option>
                                                    <option value="MN">Minnesota</option>
                                                    <option value="MS">Mississippi</option>
                                                    <option value="MO">Missouri</option>
                                                    <option value="OK">Oklahoma</option>
                                                    <option value="SD">South Dakota</option>
                                                    <option value="TX">Texas</option>
                                                    <option value="TN">Tennessee</option>
                                                    <option value="WI">Wisconsin</option>
                                                </optgroup>
                                                <optgroup label="Eastern Time Zone">
                                                    <option value="CT">Connecticut</option>
                                                    <option value="DE">Delaware</option>
                                                    <option value="FL">Florida</option>
                                                    <option value="GA">Georgia</option>
                                                    <option value="IN">Indiana</option>
                                                    <option value="ME">Maine</option>
                                                    <option value="MD">Maryland</option>
                                                    <option value="MA">Massachusetts</option>
                                                    <option value="MI">Michigan</option>
                                                    <option value="NH">New Hampshire</option>
                                                    <option value="NJ">New Jersey</option>
                                                    <option value="NY">New York</option>
                                                    <option value="NC">North Carolina</option>
                                                    <option value="OH">Ohio</option>
                                                    <option value="PA">Pennsylvania</option>
                                                    <option value="RI">Rhode Island</option>
                                                    <option value="SC">South Carolina</option>
                                                    <option value="VT">Vermont</option>
                                                    <option value="VA">Virginia</option>
                                                    <option value="WV">West Virginia</option>
                                                </optgroup>
                                            </select>
                                        </div>
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