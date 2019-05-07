@extends('layouts.admin')
@section('content')

        <div class="card-header border-bottom">
            <div class="description comment">
                <div class="page-header row no-gutters py-0">
                    <div class="col-12 col-sm-6 text-center text-sm-left mb-0">
                        <span class="text-uppercase page-subtitle"><a style="font-size: 15px" href="{{ route('thrust.hasMany', ['organizations', $lead->organization, 'leads']) }}"> {{ trans_choice('admin.organization', 1) }} · {{ nameOrDash($lead->organization) }} · {{ trans_choice('admin.lead', 2) }}</a></span>
                        <!--<h3 class="page-title">Organizaciones</h3>-->
                    </div>
                    <div class="col-12 col-sm-6 text-center text-sm-right mb-0">
                        @busy <span class="badge badge-accent lead-status-{{ $lead->statusName() }}"> {{ __("admin." . $lead->statusName() ) }} </span> &nbsp;
{{--                        <span class="date">{{  $lead->created_at->diffForHumans() }} · {{  nameOrDash($lead->team) }}</span>--}}
                        <span class="date">{{  $lead->created_at->diffForHumans() }} </span>
                        &nbsp;·&nbsp;&nbsp;
                        <a href="{{ route('lead.show', [$lead->id]) }}/download">
                            <span class="product text-center">{{__('app.proposal.download')}}</span>@icon(download)
                        </a>
                    </div>
                </div>

                <h6 class="m-0  py-4"> {{ nameOrDash($lead->organization) }} · {{ $lead->name }} · {{ $lead->email }} </h6>
            </div>
        </div>

    <div class="p-3">
        <div class="description comment lead-show">
            {{ Form::open(["url" => route('leads.update', $lead), 'method' => "PUT"]) }}
            @include('components.lead.fields', ["lead" => $lead])
            <button class="btn btn-accent uppercase  mt-4"> {{ __('admin.update') }}</button>
            {{ Form::close() }}
        </div>
<br /><br />
        <div class="comment new-comment mt4">
            <h4>{{ __('admin.newComment') }}</h4>
            {{ Form::open(["url" => route("leads.status.store", $lead), "files" => true, "id" => "comment-form"]) }}
            <textarea class="form-control" name="body"></textarea>
            <br>
            @include('components.uploadAttachment', ["attachable" => $lead, "type" => "leads"])
            {{ Form::hidden("new_status", $lead->status, ["id" => "new_status"]) }}

            <div class="dropdown">
                <button class="btn btn-accent dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    @icon(comment) {{ __('admin.commentAs') }} ... {{-- __("admin." . $lead->statusName()) --}}
                </button>
                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                        @foreach(App\Models\Lead::availableStatus() as $value => $status)
                            <a class="dropdown-item" onClick="setStatusAndSubmit( {{ $value    }} )"><div style="width:10px; height:10px" class="circle inline lead-status-{{$status}} mr1"></div> {{ __('admin.commentAs') }} <b>{{ __("admin.$status") }}   </b> </a>
                        @endforeach

                </div>
            </div>

            {{ Form::close() }}
        </div>
        @include('components.leadStatus')
    </div>

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