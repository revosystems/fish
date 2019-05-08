<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}" class="no-js h-100">
<head>
    @include('layouts.partials-admin.head')
</head>
<body class="h-100 {{ config('app.platform') }}">
    <div class="container-fluid">
        <div class="row">
            @include('layouts.partials-admin.sidebar')

            <main class="main-content col-lg-10 col-md-9 col-sm-12 p-0 offset-lg-2 offset-md-3">
                <div class="main-navbar sticky-top bg-white">
                    @include('layouts.partials-admin.header')
                </div>
                <div class="main-content-container container-fluid px-4">
                    @include('components.errors')
                    @include('layouts.partials-admin.breadcrumb')

                    <div class="row">
                        <div class="col">
                            <div class="card card-small mb-4">
                                {{--<div class="card-header border-bottom">
                                    <h6 class="m-0">
                                        {{ trans_choice(config('thrust.translationsPrefix') . str_singular($resourceName), 2) }} ({{ $resource->count() }})
                                    </h6>
                                    <h6 class="m-0">Organizaciones</h6>
                                </div>--}}
                                <div class="card-body p-0">
                                    @yield('content')
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                @include('layouts.partials-admin.footer')
            </main>
        </div>
    </div>


    @include('layouts.partials-admin.popup')
    <script src="{{ asset('js/admin.js') }}"></script>

    @yield('scripts')
    @stack('edit-scripts')

<script>
    $('.toggle-sidebar').click(function (e) {
        $('.main-sidebar').toggleClass('open');
    });
</script>
</body>
</html>
