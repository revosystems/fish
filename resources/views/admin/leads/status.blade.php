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
                                @iconMaterial(insert_comment) {{ __('admin.commentAs') }}
                                ... {{-- __("admin." . $lead->statusName()) --}}
                            </button>
                            <div class="dropdown-menu w-100">
                                @foreach(App\Models\Status::all() as $key => $value)
                                    <a class="dropdown-item" onClick="setStatusAndSubmit( {{ $key}} )">
                                        <div class="dot-wrap">
                                            <div class="rounded-circle dot lead-status-{{$value['key']}}"></div>
                                        </div>
                                        {{ __('admin.commentAs') }} <b>{{ $value['name'] }} </b>
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
                @include('components.leadComments')
            </div>
        </div>
    </div>
</div>