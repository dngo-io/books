<!-- BEGIN: Topbar -->
<div id="m_header_topbar" class="m-topbar  m-stack m-stack--ver m-stack--general">
    @include("partials.header.top-bar.top-bar-search-default")
    <div class="m-stack__item m-topbar__nav-wrapper">
        <ul class="m-topbar__nav m-nav m-nav--inline">
            @include("partials.header.top-bar.top-bar-notifications")
            @include("partials.header.top-bar.top-bar-quick-actions")
            @include("partials.header.top-bar.top-bar-user-profile")
        </ul>
    </div>
</div>
<!-- END: Topbar -->