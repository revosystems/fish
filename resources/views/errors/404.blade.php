@extends('layouts.errors')
@section('html', 'errors')
@section('title', __('app.pageTitles.error404').' - ')

@section('content')
    <div class="section">
        <div class="home text-center">
            <div class="error-title">{{__('app.error404_hint')}}</div>
            <img src="{{ asset('images/doing.png') }}" class="hero" alt="@lang('app.channel')"/>
            <a href="{{route('lead.create')}}" class="text-center">
                <h1>@lang('app.home.newLeadButton')<span class="plus"></span></h1>
            </a>
        </div>
    </div>
@endsection