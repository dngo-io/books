<!-- begin:: Page -->
<div class="m-grid m-grid--hor m-grid--root m-page">
    @include("partials.header-base")
    <!-- begin::Body -->
    <div class="m-grid__item m-grid__item--fluid m-grid m-grid--hor-desktop m-grid--desktop m-body">
        <div class="m-grid__item m-grid__item--fluid m-grid m-grid--ver-desktop m-grid--desktop m-container m-container--responsive m-container--xxl m-container--full-height">
            <div class="m-grid__item m-grid__item--fluid m-wrapper">
                @if(Route::getCurrentRoute()->getActionMethod() != 'root_index')
                    @include("partials.subheader-default")
                @endif
                <div class="m-content">@yield("content")</div>
            </div>
        </div>
    </div>
    <!-- end:: Body -->
    @include("partials.footer-default")
</div>
<!-- end:: Page -->
@include("partials.layout.layout-scroll-top")