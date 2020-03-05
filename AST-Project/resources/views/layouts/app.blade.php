<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
@include('partials.head')
<body>
    <div id="app">

        @include('partials.nav')
        <main class="p-2">
            @include('partials.alerts')
            @yield('content')
        </main>
    </div>
</body>
</html>
