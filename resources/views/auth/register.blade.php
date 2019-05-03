@extends('layouts.auth')

@section('content')
        <div class="row">
            <div class="col-md-8 offset-md-2 col-sm-10 offset-sm-1">
                <form method="POST" action="{{ route('register') }}" class="login-form">
                    @csrf
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group">
                                <div class="input-group {{ $errors->has('enterprise') ? ' is-invalid' : '' }}">
                                    <input type="text" name="enterprise" id="enterprise" value="{{ old('enterprise') }}" placeholder="@lang('auth.fields.enterprise')" class="form-control">
                                </div>
                                @if ($errors->has('enterprise'))
                                    <span class="invalid-feedback" role="alert">{{ $errors->first('enterprise') }}</span>
                                @endif
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group isPicker {{ $errors->has('territory') ? ' is-invalid' : '' }}">
                                <select class="selectpicker  @if (old('territory') !='') {{ 'started' }} @endif" name="territory" id="territory" title="{{ __('auth.fields.territory') }}" data-size="5">
                                    <option value='CAT' @if (old('territory') == "CAT") {{ 'selected' }} @endif data-content="<div class='hideHint'>{{ __('auth.fields.territory') }}</div><div class='colored'> {{ __('auth.fields.territoryCat') }}</div>">{{__('auth.fields.territoryCat')}}</option>
                                    <option value='CAT' @if (old('territory') == "NOR") {{ 'selected' }} @endif data-content="<div class='hideHint'>{{ __('auth.fields.territory') }}</div><div class='colored'> {{ __('auth.fields.territoryNorte') }}</div>">{{ __('auth.fields.territoryNorte') }}</option>
                                    <option value='CNT' @if (old('territory') == "CNT") {{ 'selected' }} @endif data-content="<div class='hideHint'>{{ __('auth.fields.territory') }}</div><div class='colored'> {{ __('auth.fields.territoryCentro') }}</div>">{{ __('auth.fields.territoryCentro') }}</option>
                                    <option value='SUR' @if (old('territory') == "SUR") {{ 'selected' }} @endif data-content="<div class='hideHint'>{{ __('auth.fields.territory') }}</div><div class='colored'> {{ __('auth.fields.territorySur') }}</div>">{{ __('auth.fields.territorySur') }}</option>
                                </select>
                                @if ($errors->has('territory'))
                                    <span class="invalid-feedback" role="alert">{{ $errors->first('territory') }}</span>
                                @endif
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-4">
                            <div class="form-group">
                                <div class="input-group {{ $errors->has('name') ? ' is-invalid' : '' }}">
                                    <input type="text" name="name" id="name" value="{{ old('name') }}" placeholder="@lang('auth.fields.name')" class="form-control" >
                                </div>
                                @if ($errors->has('name'))
                                    <span class="invalid-feedback" role="alert">{{ $errors->first('name') }}</span>
                                @endif
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="form-group">
                                <div class="input-group {{ $errors->has('firstsurname') ? ' is-invalid' : '' }}">
                                    <input type="text" name="firstsurname" id="firstsurname" value="{{ old('firstsurname') }}" placeholder="@lang('auth.fields.surname1')" class="form-control "  >
                                </div>
                                @if ($errors->has('firstsurname'))
                                    <span class="invalid-feedback" role="alert">{{ $errors->first('firstsurname') }}</span>
                                @endif
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="form-group">
                                <div class="input-group {{ $errors->has('secondsurname') ? ' is-invalid' : '' }}">
                                    <input type="text" name="secondsurname" id="secondsurname" value="{{ old('secondsurname') }}" placeholder="@lang('auth.fields.surname2')" class="form-control"  >
                                </div>
                                @if ($errors->has('secondsurname'))
                                    <span class="invalid-feedback" role="alert">{{ $errors->first('secondsurname') }}</span>
                                @endif
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group">
                                <div class="input-group {{ $errors->has('department') ? ' is-invalid' : '' }}">
                                    <input type="text" name="department" id="department" value="{{ old('department') }}" placeholder="@lang('auth.fields.department')" class="form-control"  >
                                </div>
                                @if ($errors->has('department'))
                                    <span class="invalid-feedback" role="alert">{{ $errors->first('department') }}</span>
                                @endif
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <div class="input-group {{ $errors->has('position') ? ' is-invalid' : '' }}">
                                    <input type="text" name="position" id="position" value="{{ old('position') }}" placeholder="@lang('auth.fields.position')" class="form-control"  >
                                </div>
                                @if ($errors->has('position'))
                                    <span class="invalid-feedback" role="alert">{{ $errors->first('position') }}</span>
                                @endif
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group">
                                <div class="input-group {{ $errors->has('email') ? ' is-invalid' : '' }}">
                                    <input type="email" name="email" id="email" value="{{ old('email') }}" placeholder="@lang('auth.fields.email')" class="form-control"  >
                                </div>
                                @if ($errors->has('email'))
                                    <span class="invalid-feedback" role="alert">{{ $errors->first('email') }}</span>
                                @endif
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <div class="input-group {{ $errors->has('phone') ? ' is-invalid' : '' }}">
                                    <input type="phone" name="phone" id="phone" value="{{ old('phone') }}" placeholder="@lang('auth.fields.phone')" class="form-control"  >
                                </div>
                                @if ($errors->has('phone'))
                                    <span class="invalid-feedback" role="alert">{{ $errors->first('phone') }}</span>
                                @endif
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group">
                                <div class="input-group {{ $errors->has('password') ? ' is-invalid' : '' }}">
                                    <input type="password" name="password" id="password" placeholder="@lang('auth.fields.password')" class="form-control" >
                                </div>
                                @if ($errors->has('password'))
                                    <span class="invalid-feedback" role="alert">{{ $errors->first('password') }}</span>
                                @endif
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <div class="input-group {{ $errors->has('password') ? ' is-invalid' : '' }}">
                                    <input type="password" name="password_confirmation" id="password-confirm" placeholder="@lang('auth.fields.passwordConfirm')" class="form-control" >
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-12">
                            <button type="submit" class="btn register">@lang('auth.register.button')</button>
                            <a class="inverted alone text-center" href="{{ route('login') }}">@lang("auth.register.loginLink")</a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
@endsection
