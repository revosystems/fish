@extends('layouts.admin')
@section('content')
    <div class="card card-small mb-4">
        <div class="card-header border-bottom">
            <div class="description comment">
                <div class="row page-header no-gutters py-0">
                    <div class="col-12 col-sm-6 text-center text-sm-left mb-0">
                        <span class="text-uppercase page-subtitle">
                            <h6 class="m-0"><a  href="{{ route('thrust.hasMany', ['organizations', $lead->organization, 'leads']) }}"> {{ trans_choice('admin.organization', 1) }} · {{ nameOrDash($lead->organization) }} · {{ trans_choice('admin.lead', 2) }}</a></h6>
                        </span>
                    </div>
                    <div class="col-12 col-sm-6 text-center text-sm-right mb-0">
                        @busy
                        <span class="date pr-2">{{  $lead->created_at->diffForHumans() }} </span>
                        <span class="btn lead-status-{{ $lead->status()->key }}"> {{ $lead->status()->name }} </span> &nbsp;
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
            <br>
            {{ Form::open(["url" => route('leads.update', $lead), 'method' => "PUT"]) }}
            @include('admin.leads.components.select', ['options' => App\Models\Probability::all(), 'object' => $lead, 'name' => 'probability'])
            @include('admin.leads.components.input', ['object' => $lead, 'name' => 'total', 'type' => 'number'])
            @include('admin.leads.components.input', ['object' => $lead, 'name' => 'total_devices', 'type' => 'number', 'title' => "totalDevices"])
            @include('admin.leads.components.select', ['options' => App\Models\Status::all(), 'object' => $lead, 'name' => 'status'])

            <div class="card card-small mb-4">
                <div class="card-body p-0 update-button">
                    <button class="btn btn-accent uppercase w-100 h-100"> {{ __('admin.update') }}</button>
                </div>
            </div>
            {{ Form::close() }}
            <a href="{{ route('lead.showMore', $lead->id) }}">{{ __('admin.showMore') }} @icon(plus)</a>
        </div>
    </div>
    <div class="card card-small mb-4">
        @include('admin.leads.comments')
    </div>
@stop

@section('scripts')
    {{--@include('components.js.taggableInput', ["el" => "tags", "endpoint" => "leads", "object" => $lead])--}}
    <script>
        $(document).ready(function(){
            $('input[type="file"]').change(function(e){
                $(".attachment-selected").html(e.target.files[0].name);
            });
        });
    </script>
@stop