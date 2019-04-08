@extends('layouts.admin')
@section('content')
    <div class="description comment">
        <div class="breadcrumb">
            <a href="{{ route('thrust.hasMany', ['organizations', $lead->organization, 'leads']) }}"> {{ trans_choice('admin.organization', 1) }} · {{ nameOrDash($lead->organization) }} · {{ trans_choice('admin.lead', 2) }}</a>
        </div>
        <h3> {{ nameOrDash($lead->organization) }} · {{ $lead->name }} · {{ $lead->email }} </h3>
        @busy <span class="label lead-status-{{ $lead->statusName() }}"> {{ __("admin." . $lead->statusName() ) }} </span> &nbsp;
        <span class="date">{{  $lead->created_at->diffForHumans() }} · {{  nameOrDash($lead->team) }}</span>
        <a href="{{ route('lead.show', [$lead->id]) }}/download">
            <span class="product text-center">{{__('app.proposal.download')}}</span>@icon(download)
        </a>
    </div>

    <div class="description comment lead-show">
        {{ Form::open(["url" => route('leads.update', $lead), 'method' => "PUT"]) }}
            @include('components.lead.fields', ["lead" => $lead])
            <button class="uppercase float-right mt-4"> {{ __('admin.update') }}</button>
        {{ Form::close() }}
    </div>

    <div class="comment new-comment mt4">
        <h4>{{ __('admin.newComment') }}</h4>
        {{ Form::open(["url" => route("leads.status.store", $lead), "files" => true, "id" => "comment-form"]) }}
        <textarea name="body"></textarea>
        <br>
        @include('components.uploadAttachment', ["attachable" => $lead, "type" => "leads"])
        {{ Form::hidden("new_status", $lead->status, ["id" => "new_status"]) }}

        <button class="uppercase ph3"> @icon(comment) {{ __('admin.commentAs') }} {{ __("admin." . $lead->statusName()) }}</button>
        <span class="dropdown button caret-down"> @icon(caret-down) </span>
        <ul class="dropdown-container">
            @foreach(App\Models\Lead::availableStatus() as $value => $status)
                <li><a class="pointer" onClick="setStatusAndSubmit( {{ $value    }} )"><div style="width:10px; height:10px" class="circle inline lead-status-{{$status}} mr1"></div> {{ __('admin.commentAs') }} <b>{{ __("admin.$status") }}   </b> </a></li>
            @endforeach
        </ul>
        {{ Form::close() }}
    </div>
    @include('components.leadStatus')
@endsection

@section('scripts')
    {{--@include('components.js.taggableInput', ["el" => "tags", "endpoint" => "leads", "object" => $lead])--}}
    <script>
        function setStatusAndSubmit(new_status){
            $("#new_status").val(new_status);
            $("#comment-form").submit();
        }
    </script>
@endsection