@extends('layouts.auth')

@section('content')
        <div class="row">
            <div class="col-md-4 col-md-offset-4">
                @if (session('resent'))
                    <div class="alert text-center" role="alert">
                        @lang('auth.register.verifyNotification')
                    </div>
                @endif

                <div class="box-info">
                    <h3>@lang('auth.register.verifyTitle')</h3><br />
                    @lang('auth.register.verifyHint')
                    <br /><br />
                    @lang('auth.register.verifyLinkIntro'), <br /><a href="{{ route('verification.resend') }}" class="btn-simlynk-inline align-center">@lang('auth.register.verifyLinkClick').</a>
                </div>
            </div>
        </div>
@endsection