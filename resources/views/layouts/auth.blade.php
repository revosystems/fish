<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    @include("layouts.partials.header.head")
    {{--    <body class="auth {{ auth()->user()->getOrganizationName() }}">--}}
    <body class="auth">
        @include("layouts.partials.loaders.preloader")
        <div class="container login-container">
            <div class="row">
                <div class="col-md-4 offset-md-4">
                    <div class="login-logo-wrap">
                        <img class="login-logo" alt="@lang('app.subtitle') - @lang('app.title') " src="{{ asset('images/logo-overview.png') }}">
                        <span class="login-subtitle">@lang('app.subtitle')</span>
                    </div>
                </div>
            </div>
            @yield("content")
            <footer id="footer" class="text-center">
                <a href="https://revo.works/es" target="_blank">&copy; REVO SYSTEMS <?=date("Y")?></a>
            </footer>
            @include("layouts.partials.footer.footer-scripts")
        </div>
    </body>
</html>