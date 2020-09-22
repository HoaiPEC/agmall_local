<!DOCTYPE html>
<html lang="en">
<head>
    @include('admin.layouts.common.head')
</head>

<body id="kt_body" class="header-fixed header-mobile-fixed
    subheader-enabled subheader-fixed aside-enabled aside-fixed aside-minimize-hoverable page-loading">

    @include('admin.layouts.common.header-mobile')

    <div class="d-flex flex-column flex-root">
        <div class="d-flex flex-row flex-column-fluid page">

            @include('admin.layouts.common.aside')

            <div class="d-flex flex-column flex-row-fluid wrapper" id="kt_wrapper">
                @include('admin.layouts.common.header')
                @yield('content')
                @include('admin.layouts.common.footer')
            </div>
        </div>
    </div>

    @include('admin.layouts.common.user-panel')

    @include('admin.layouts.common.chat-panel')

    @include('admin.layouts.common.scroll_top')

    @include('admin.layouts.common.sticky_toolbar')

    @include('admin.layouts.common.foot')

</body>
</html>
