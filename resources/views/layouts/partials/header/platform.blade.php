<div class="platform">
    <div class="platform_{{ config('app.platform') }}"></div>
    <div class="trade">
        <a href="{{ route("home") }}" class="clearfix">
            <img src="{{ asset('images/logo-over.png') }}" class="logo-img" alt="{{ __('app.subtitle') }} - {{ __('app.title') }} ">
            <div class="subtitle">{{ __('app.subtitle') }}</div>
        </a>
        <div class="slogan">{{ __('app.slogan') }}</div>
    </div>
</div>