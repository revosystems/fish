@extends('layouts.auth')

@section('content')
        <div class="row">
            <div class="col-md-4 offset-md-4">
                @if (session('status'))
                    <div class="alert text-center" role="alert">
                        {{ session('status') }}
                    </div>
                @endif

                <form method="POST" action="{{ route('password.email') }}">
                    @csrf
                    <div class="form-group">
                        <div class="input-group {{ $errors->has('email') ? ' is-invalid' : '' }}">
                            <input type="email" name="email" id="email" value="{{ old('email') }}" placeholder="@lang('auth.fields.email')" class="form-control">
                        </div>
                        @if ($errors->has('email'))
                            <span class="invalid-feedback" role="alert"> {{ $errors->first('email') }} </span>
                        @endif
                    </div>
                    <button type="submit" class="btn">@lang('auth.forgot.button')</button>
                    <a class="inverted alone text-center" href="{{ route('login') }}">@lang("auth.login.backLink")</a>
                </form>
            </div>
        </div>
@endsection