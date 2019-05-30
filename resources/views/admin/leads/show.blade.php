@extends('layouts.admin')
@section('content')
<div class="card-header border-bottom">
    <div class="description comment">
        <div class="page-header row no-gutters py-0">
            <div class="col-12 col-sm-6 text-center text-sm-left mb-0">
                <span class="text-uppercase page-subtitle">
                    <h6 class="m-0"><a  href="{{ route('thrust.hasMany', ['organizations', $lead->organization, 'leads']) }}"> {{ trans_choice('admin.organization', 1) }} · {{ nameOrDash($lead->organization) }} · {{ trans_choice('admin.lead', 2) }}</a></h6>
                </span>
            </div>
            <div class="col-12 col-sm-6 text-center text-sm-right mb-0">
                @busy
                <span class="date pr-2">{{  $lead->created_at->diffForHumans() }} </span>
                <span class="btn lead-status-{{ $lead->statusName() }}"> {{ __("admin." . $lead->statusName() ) }} </span> &nbsp;
                <span class="download-proposal">
                    <a class="btn btn-accent" href="{{ route('lead.show', [$lead->id]) }}/download">
                        <span class="product text-center">{{__('app.proposal.download')}}</span> @iconMaterial (description)
                    </a>
                </span>
            </div>
        </div>
    </div>
</div>
<div class="card-body p-3">
    <h6 class="m-0"> {{ $lead->name }} · {{ $lead->email }} </h6>
</div>
{{-- ############FAKE NEW CARD ############ --}}
   </div>
{{-- ###################################### --}}

{{ Form::open(["url" => route('leads.update', $lead), 'method' => "PUT"]) }}
    @include('admin.leads.edit', compact('lead'))
    <div class="card card-small  mt-4 mb-4">
        <div class="card-body p-0 update-button">
            <button class="btn btn-accent uppercase w-100 h-100"> {{ __('admin.update') }}</button>
        </div>
   </div>
{{ Form::close() }}

<div class="card card-small mb-4">
    <div class="card-header border-bottom">
        <h6 class="m-0">{{ __('admin.newComment') }}</h6>
    </div>
    <div class="card-body p-0">
        <div class="row">
            <div class="col col-xs-12">
                <div class="comment new-comment p-3 mb-4 pt-4 pb-4 border-bottom ">
                    {{ Form::open(["url" => route("leads.status.store", $lead), "files" => true, "id" => "comment-form"]) }}
                        <div class="row">
                            <div class="col col-xs-12">
                                <textarea class="form-control mt-0 mb-3" name="body"></textarea>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-xs-12 col-sm-6">
                                {{ Form::hidden("new_status", $lead->status, ["id" => "new_status"]) }}
                                <div class="dropdown comment-status-dropdown">
                                    <button class="btn btn-accent dropdown-toggle" type="button" data-toggle="dropdown">
                                        @iconMaterial(insert_comment) {{ __('admin.commentAs') }} ... {{-- __("admin." . $lead->statusName()) --}}
                                    </button>
                                    <div class="dropdown-menu w-100">
                                        @foreach(App\Models\Status::all() as $key => $value)
                                            <a class="dropdown-item" onClick="setStatusAndSubmit( {{ $key}} )">
                                                <div class="dot-wrap">
                                                    <div class="rounded-circle dot lead-status-{{$value['name']}}"></div>
                                                </div>
                                                {{ __('admin.commentAs') }} <b>{{ __("admin." . $value['name']) }} </b>
                                            </a>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-6">
                                @include('components.uploadAttachment', ["attachable" => $lead, "type" => "leads"])
                            </div>
                        </div>
                    {{ Form::close() }}
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col col-xs-12">
                <div class="p-3 comments-block">
                    @include('components.leadStatus')
                </div>
            </div>
        </div>
        {{-- ###################################### --}}
        {{-- ###################################### --}}
@endsection

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
@endsection