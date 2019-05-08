<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="@yield('html')">
    @include("layouts.partials.header.head")
    <body class="app @yield('section') {{ config('app.platform') }}">
        @include("layouts.partials.loaders.preloader")
        <div class="ball"></div>
        @yield("content")
        @include("layouts.partials.footer.footer-scripts")
        @include("layouts.partials.footer.footer-back-top")
    </body>
</html>