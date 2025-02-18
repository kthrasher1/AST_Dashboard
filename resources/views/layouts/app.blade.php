<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
@include('partials.head')
<body>
    <div id="app">

        @include('partials.nav')
        <main class="">
            @yield('content')
        </main>
    </div>


    <script src="{{ asset('js/app.js') }}" defer></script>

    @yield('graph-script')

</body>
</html>
