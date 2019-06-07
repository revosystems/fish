@extends('layouts.app')
@section('section', 'onLead')
@section('title', __('app.pageTitles.createLead').' - ')
@section('content')
    <form method="POST" action="{{ route('lead.store') }}">
        @csrf
        <div class="section">
            <div class="container">
                @if (session('exception'))
                    <div class="alert a" role="alert">{{ session('exception') }}</div>
                @endif
                <div class="row row_title no-mt">
                    <div class="col-sm-12">{{ __('app.lead.formHint') }}</div>
                </div>
                @include('app.lead.partials.segmentation')
                @include('app.lead.partials.generalInfo')
                @include('app.lead.partials.property')
                @include('app.lead.partials.configuration')
            </div>
            <div class="container">
                <div class="row">
                    <div class="col-sm-12">
                        <button type="submit" class="btn">{{ __('app.lead.saveLead') }}</button>
                    </div>
                </div>
            </div>
        </div>
    </form>
{{--    @if ($errors->count()) {{dd($errors)}}@endif--}}

@stop
