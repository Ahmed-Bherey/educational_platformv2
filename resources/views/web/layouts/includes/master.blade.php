@include('web.layouts.includes.head')
<header>
    <div class="main">
        <div class="main_banner">
            @include('web.layouts.includes.header')
            @include('web.layouts.includes.header_banner')
        </div>
    </div>
</header>
@yield('content')
@include('web.layouts.includes.footer')
@include('web.layouts.includes.scripts')

<script src="https://unpkg.com/aos@next/dist/aos.js"></script>
<script>
    AOS.init();
</script>
</body>

</html>
