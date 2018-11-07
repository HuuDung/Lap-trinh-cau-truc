@include('layouts.header')
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">
    @include('modules.nav-left')
    @include('modules.nav-top')
    <div class="content-wrapper">
        @yield('content')
    </div>
</div>
@include('layouts.footer')
