@extends("layout.metronic")
@section("title", "Road Map")
@section("content")
    <div class="m-timeline-1 m-timeline-1--fixed">
        <div class="m-timeline-1__items">
            <div class="m-timeline-1__marker"></div>
            <div class="m-timeline-1__item m-timeline-1__item--left m-timeline-1__item--first">
                <div class="m-timeline-1__item-circle"><div class="m--bg-danger"></div></div>
                <div class="m-timeline-1__item-arrow"></div>
                <span class="m-timeline-1__item-time m--font-brand">15 Jan 2018</span>
                <div class="m-timeline-1__item-content">
                    <div class="m-timeline-1__item-title">
                        Team Building
                    </div>
                    <div class="m-timeline-1__item-body">
                        <div class="m-list-pics">
                            <a href="#"><img src="{{ asset("assets/app/media/img/users/100_4.jpg") }}" title=""></a>
                            <a href="#"><img src="{{ asset("assets/app/media/img/users/100_13.jpg") }}" title=""></a>
                            <a href="#"><img src="{{ asset("assets/app/media/img/users/100_11.jpg") }}" title=""></a>
                            <a href="#"><img src="{{ asset("assets/app/media/img/users/100_14.jpg") }}" title=""></a>
                        </div>
                        <div class="m-timeline-1__item-body m--margin-top-15">
                            Lorem ipsum dolor sit amit,consectetur eiusmdd<br>
                            tempors labore et dolore.
                        </div>
                    </div>
                </div>
            </div>
            <div class="m-timeline-1__item m-timeline-1__item--right">
                <div class="m-timeline-1__item-circle"><div class="m--bg-danger"></div></div>
                <div class="m-timeline-1__item-arrow"></div>
                <span class="m-timeline-1__item-time m--font-brand">01 Mar 2018</span>
                <div class="m-timeline-1__item-content">
                    <div class="m-timeline-1__item-title">
                        Whitepaper released
                    </div>
                    <div class="m-timeline-1__item-body">
                        Lorem ipsum dolor sit amit,consectetur eiusmdd<br>
                        tempor incididunt ut labore et dolore magna enim<br>
                        ad minim veniam nostrud.
                    </div>
                    <div class="m-timeline-1__item-actions">
                        <a  href="#" class="btn btn-sm btn-outline-brand m-btn m-btn--pill m-btn--custom">Read</a>
                    </div>
                </div>
            </div>
            <div class="m-timeline-1__item m-timeline-1__item--left">
                <div class="m-timeline-1__item-circle"><div class="m--bg-danger"></div></div>
                <div class="m-timeline-1__item-arrow"></div>
                <span class="m-timeline-1__item-time m--font-brand">30 March 2018, Istanbul</span>
                <div class="m-timeline-1__item-content">
                    <div class="m-timeline-1__item-title">
                        Community Local Meet-up @Place 18:00
                    </div>
                    <hr>
                    <div style="height:170px;">
                        <div style="height:100%;overflow:hidden;display:block;background: url(http://maps.googleapis.com/maps/api/staticmap?center=48.858271,2.294264&amp;size=640x300&amp;zoom=5&amp;key=AIzaSyBMlTEcPR5QULmk9QUaS7lwUK7qtabunEI) no-repeat 50% 50%;">
                            <img src="http://maps.googleapis.com/maps/api/staticmap?center=48.858271,2.294264&amp;size=640x300&amp;zoom=16&amp;key=AIzaSyBMlTEcPR5QULmk9QUaS7lwUK7qtabunEI" style="" alt="">
                        </div>
                    </div>
                </div>
            </div>
            <div class="m-timeline-1__item m-timeline-1__item--right">
                <div class="m-timeline-1__item-circle"><div class="m--bg-danger"></div></div>
                <div class="m-timeline-1__item-arrow"></div>
                <span class="m-timeline-1__item-time m--font-brand">04:10<span>PM</span></span>
                <div class="m-timeline-1__item-content">
                    <div class="m-timeline-1__item-title">
                        My ToDo
                    </div>
                    <div class="m-list-badge m--margin-top-15">
                        <div class="m-list-badge__label m--font-success">12:00</div>
                        <div class="m-list-badge__items">
                            <a href="#" class="m-list-badge__item">Hiking</a>
                            <a href="#" class="m-list-badge__item">Lunch</a>
                            <a href="#" class="m-list-badge__item">Meet John</a>
                        </div>
                    </div>
                    <div class="m-list-badge m--margin-top-15">
                        <div class="m-list-badge__label m--font-success">13:00</div>
                        <div class="m-list-badge__items">
                            <span class="m-list-badge__item">Setup AOL</span>
                            <span class="m-list-badge__item">Write Code</span>
                        </div>
                    </div>
                    <div class="m-list-badge m--margin-top-15">
                        <div class="m-list-badge__label m--font-success">14:00</div>
                        <div class="m-list-badge__items">
                            <a href="#" class="m-list-badge__item">Just Keep Doing Something</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="m-timeline-1__item m-timeline-1__item--left">
                <div class="m-timeline-1__item-circle"><div class="m--bg-danger"></div></div>
                <div class="m-timeline-1__item-arrow"></div>
                <span class="m-timeline-1__item-time m--font-brand">05:00&nbsp;<span>PM</span></span>
                <div class="m-timeline-1__item-content">
                    <div class="media">
                        <img class="m--margin-right-20" src="assets/app/media/img/products/product1.jpg" title="">
                        <div class="media-body">
                            <div class="m-timeline-1__item-title m--margin-top-10  ">
                                Some Post
                            </div>
                            <div class="m-timeline-1__item-body">
                                Lorem ipsum dolor sit amit<br>
                                consectetur eiusmdd<br>
                                tempor incididunt ut labore<br>
                                et dolore magna.
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="m-timeline-1__items">
            <div class="m-timeline-1__marker"></div>
            <div class="m-timeline-1__item m-timeline-1__item--right">
                <div class="m-timeline-1__item-circle"><div class="m--bg-danger"></div></div>
                <div class="m-timeline-1__item-arrow"></div>
                <span class="m-timeline-1__item-time m--font-brand">11:35<span>AM</span></span>
                <div class="m-timeline-1__item-content">
                    <div class="m-timeline-1__item-title">
                        Users Joined Today
                    </div>
                    <div class="m-timeline-1__item-body">
                        <div class="m-list-badge m--margin-bottom-20">
                            <div class="m-list-badge__label m--font-danger">12:00</div>
                            <div class="m-list-badge__items">
                                <a href="#" class="m-list-badge__item m-list-badge__item--brand">Technology</a>
                                <a href="#" class="m-list-badge__item m-list-badge__item--focus">Sport</a>
                                <a href="#" class="m-list-badge__item m-list-badge__item--success">Art</a>
                                <a href="#" class="m-list-badge__item m-list-badge__item--danger">Music</a>
                            </div>
                        </div>
                        <div class="m-list-badge m--margin-bottom-20">
                            <div class="m-list-badge__label m--font-brand">18:30</div>
                            <div class="m-list-badge__items">
                                <span class="m-list-badge__item m-list-badge__item--focus">Web Design</span>
                                <span class="m-list-badge__item m-list-badge__item--warning">Programming</span>
                                <span class="m-list-badge__item m-list-badge__item--info">Illustration</span>
                            </div>
                        </div>
                        <div class="m-list-badge">
                            <div class="m-list-badge__label m--font-warning">12:40</div>
                            <div class="m-list-badge__items">
                                <a href="#" class="m-list-badge__item m-list-badge__item--brand">Yoga</a>
                                <a href="#" class="m-list-badge__item m-list-badge__item--primary">Cooking</a>
                                <a href="#" class="m-list-badge__item m-list-badge__item--danger">Dance</a>
                                <a href="#" class="m-list-badge__item m-list-badge__item--warning">Gym</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="m-timeline-1__item m-timeline-1__item--left">
                <div class="m-timeline-1__item-circle"><div class="m--bg-danger"></div></div>
                <div class="m-timeline-1__item-arrow"></div>
                <span class="m-timeline-1__item-time m--font-brand">02:58<span>PM</span></span>
                <div class="m-timeline-1__item-content">
                    <div class="m-timeline-1__item-title">
                        Latest News
                    </div>
                    <div class="m-timeline-1__item-body m--margin-top-20">
                        Lorem ipsum dolor sit amit,consectetur eiusmdd<br>
                        tempor incididunt ut labore et dolore magna enim<br>
                        ad minim veniam nostrud
                    </div>
                    <div class="m-timeline-1__item-btn m--margin-top-25">
                        <a  href="#" class="btn btn-sm btn-outline-brand m-btn m-btn--pill m-btn--custom">Read more...</a>
                    </div>
                </div>
            </div>
            <div class="m-timeline-1__item m-timeline-1__item--right">
                <div class="m-timeline-1__item-circle"><div class="m--bg-danger"></div></div>
                <div class="m-timeline-1__item-arrow"></div>
                <span class="m-timeline-1__item-time m--font-brand">04:10<span>PM</span></span>
                <div class="m-timeline-1__item-content">
                    <div class="m-timeline-1__item-title">
                        My ToDo
                    </div>
                    <div class="m-list-badge m--margin-top-15">
                        <div class="m-list-badge__label m--font-success">12:00</div>
                        <div class="m-list-badge__items">
                            <a href="#" class="m-list-badge__item">Hiking</a>
                            <a href="#" class="m-list-badge__item">Lunch</a>
                            <a href="#" class="m-list-badge__item">Meet John</a>
                        </div>
                    </div>
                    <div class="m-list-badge m--margin-top-15">
                        <div class="m-list-badge__label m--font-success">13:00</div>
                        <div class="m-list-badge__items">
                            <span class="m-list-badge__item">Setup AOL</span>
                            <span class="m-list-badge__item">Write Code</span>
                        </div>
                    </div>
                    <div class="m-list-badge m--margin-top-15">
                        <div class="m-list-badge__label m--font-success">14:00</div>
                        <div class="m-list-badge__items">
                            <a href="#" class="m-list-badge__item">Just Keep Doing Something</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="m-timeline-1__item m-timeline-1__item--left m--margin-top-10">
                <div class="m-timeline-1__item-circle"><div class="m--bg-danger"></div></div>
                <div class="m-timeline-1__item-arrow"></div>
                <span class="m-timeline-1__item-time m--font-brand">05:00<span>PM</span></span>
                <div class="m-timeline-1__item-content">
                    <div class="media">
                        <img class="m--margin-right-20" src="assets/app/media/img/products/product1.jpg" title="">
                        <div class="media-body">
                            <div class="m-timeline-1__item-title m--margin-top-10  ">
                                Some Post
                            </div>
                            <div class="m-timeline-1__item-body">
                                Lorem ipsum dolor sit amit<br>
                                consectetur eiusmdd<br>
                                tempor incididunt ut labore<br>
                                et dolore magna
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection