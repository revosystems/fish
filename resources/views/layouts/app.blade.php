<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="@yield('html')">
    @include("layouts.partials.header.head")
    <body class="app @yield('section') {{ config('app.platform') }}">
{{--        <div class="cnt-f">--}}
{{--           <div class="bodyy">--}}
                @include("layouts.partials.loaders.preloader")
                <div class="ball"></div>
                @include("layouts.partials.header.header")
                @yield("content")
                @include("layouts.partials.footer.footer-scripts")
                @include("layouts.partials.footer.footer-back-top")
{{--           </div>--}}
            @include("layouts.partials.footer.footer-legal")
{{--        </div>--}}
    </body>
</html>