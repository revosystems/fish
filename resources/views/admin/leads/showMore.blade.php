@extends('layouts.admin')
@section('content')
    <div class="card card-small mb-4">
        <div class="card-header border-bottom">
            <h6 class="m-0"><a href="{{ route('leads.show', $lead->id) }}">{{ $lead->name }}</a> · {{ $lead->email }} </h6>
        </div>
        <div class="card-body p-3">
            {{ Form::open(["url" => route('leads.update', $lead), 'method' => "PUT"]) }}
            @include('admin.leads.showMoreFormContent', compact('lead'))
            <div class="card card-small mb-4">
                <div class="card-body p-0 update-button">
                    <button class="btn btn-accent uppercase w-100 h-100"> {{ __('admin.update') }}</button>
                </div>
            </div>
            {{ Form::close() }}
        </div>
    </div>
@stop

@section('scripts')
    {{--@include('components.js.taggableInput', ["el" => "tags", "endpoint" => "leads", "object" => $lead])--}}
    <script>
        function setStatusAndSubmit(new_status){
            $("#new_status").val(new_status);
            $("#comment-form").submit();
        }

        $(document).ready(function(){
            $('input[type="file"]').change(function(e){
                $(".attachment-selected").html(e.target.files[0].name);
            });
        });
    </script>
@stop