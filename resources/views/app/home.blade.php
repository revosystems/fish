@extends('layouts.app')
@section('html', 'homeHero')
@section('content')
    {{--<div class="section home">--}}
        {{--<div>--}}
            {{--<img src="{{ asset('images/doing.png') }}" class="hero" alt="@lang('app.channel')"/>--}}
            {{--<a href="{{route('lead.create')}}" class="text-center">--}}
                {{--<h1>@lang('app.home.newLeadButton')<span class="plus"></span></h1>--}}
            {{--</a>--}}
        {{--</div>--}}
    {{--</div>--}}
{{--    <div class="container" styele="display: table;min-height: calc(100% - 60px);">--}}
    <div class="section">
        <div class="home text-center">
            <img src="{{ asset('images/doing.png') }}" class="hero" alt="@lang('app.channel')"/>
            <a href="{{route('lead.create')}}" class="text-center">
                <h1>@lang('app.home.newLeadButton')<span class="plus"></span></h1>
            </a>
        </div>
    </div>
@stop
