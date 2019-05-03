@extends('layouts.auth')

@section('content')
        <div class="row">
            <div class="col-md-4 offset-md-4">
                @if (session('errorMsg'))
                    <div class="alert text-center" role="alert">
                        @lang(session('errorMsg'))
                    </div>
                @endif
                <form method="POST" action="{{ route('login') }}">
                    @csrf
                    <div class="form-group">
                        <div class="input-group {{ $errors->has('email') ? ' is-invalid' : '' }}">
                            <input type="email" name="email" id="email" value="{{ old('email') }}" placeholder="@lang('auth.fields.email')" class="form-control" >
                        </div>
                        @if ($errors->has('email'))
                            <span class="invalid-feedback" role="alert">{{ $errors->first('email') }}</span>
                        @endif
                    </div>
                    <div class="form-group">
                        <div class="input-group {{ $errors->has('password') ? ' is-invalid' : '' }}">
                            <input type="password" name="password" id="password" placeholder="@lang('auth.fields.password')" class="form-control">
                            @if (Route::has('password.request'))
                                <a class="btn forgot-link" href="{{ route('password.request') }}">
                                    @lang('auth.login.forgotLink')
                                </a>
                            @endif
                        </div>
                        @if ($errors->has('password'))
                            <span class="invalid-feedback" role="alert">{{ $errors->first('password') }}</span>
                        @endif
                    </div>
                    <button type="submit" class="btn">@lang('auth.login.button')</button>
                    <div class="text-center">
                        <label class="checkbox-wrap">
                            <div class="checkbox">
                                <i class="fa fa-check"></i>
                                <input type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                            </div>
                            @lang('auth.fields.remember')
                        </label>
                    </div>
                    <a class="inverted alone text-center" href="{{ route('register') }}">@lang("auth.login.registerLink")</a>
                </form>
            </div>
        </div>
@endsection