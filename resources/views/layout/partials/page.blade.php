<!-- begin:: Page -->
<div class="m-grid m-grid--hor m-grid--root m-page">
@include("layout.partials.header")
<!-- begin::Body -->
    <div class="m-grid__item m-grid__item--fluid m-grid m-grid--hor-desktop m-grid--desktop m-body">
        <div class="m-grid__item m-grid__item--fluid m-grid m-grid--ver-desktop m-grid--desktop m-container m-container--responsive m-container--xxl m-container--full-height">
            <div class="m-grid__item m-grid__item--fluid m-wrapper">
                @if(Route::getCurrentRoute()->getActionMethod() != 'root_index')
                    @include("layout.partials.subheader")
                @endif
                <div class="m-content">@yield("content")</div>
            </div>
        </div>
    </div>
    <!-- end:: Body -->
    @include("layout.partials.footer")
</div>
<!-- end:: Page -->
@include("layout.partials.scroll-top")