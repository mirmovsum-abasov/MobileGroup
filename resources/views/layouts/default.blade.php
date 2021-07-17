@include('includes.head')
<body class="skin-black">
<!-- header logo: style can be found in header.less -->
@include('includes.header')
<div class="wrapper row-offcanvas row-offcanvas-left">

    @include('includes.sidebar')
    <aside class="right-side">
        @yield('content')
    </aside>
</div>
@include('includes.footer')
@include('includes.foot')
