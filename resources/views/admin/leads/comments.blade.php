<div class="card-header border-bottom">
    <h6 class="m-0">{{ __('admin.newComment') }}</h6>
</div>
<div class="card-body p-0">
    <div class="row">
        <div class="col col-xs-12">
            <div class="comment new-comment p-3 mb-4 pt-4 pb-4 border-bottom ">
                {{ Form::open(["url" => route("leads.comments.store", $lead), "files" => true, "id" => "comment-form"]) }}
                <div class="row">
                    <div class="col col-xs-12">
                        <textarea required class="form-control mt-0 mb-3" name="body"></textarea>
                    </div>
                </div>
                <div class="row">
                    <div class="col-xs-12 col-sm-6">
                        <button class="btn btn-accent" >
                            @iconMaterial(insert_comment) {{ __('admin.comment') }}...
                        </button>
                    </div>
                    <div class="col-xs-12 col-sm-6">
                        @include('components.uploadAttachment', ["attachable" => $lead, "type" => "leads"])
                    </div>
                </div>
                {{ Form::close() }}
            </div>
        </div>
    </div>
</div>
<div class="card-header border-bottom">
    <h6 class="m-0">{{ __('admin.historic') }}</h6>
</div>
<div class="card-body p-0">
    <div class="row">
        <div class="col col-xs-12">
            <div class="p-3 comments-block">
                @include('components.leadComments')
            </div>
        </div>
    </div>
</div>