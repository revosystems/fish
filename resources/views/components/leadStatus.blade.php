@foreach($lead->statusUpdates as $comment)
    <div class="comment bg-white p4 br1 mb2">
        <div class="date mb4">
            <div class="float-left mr3">@include('components.gravatar',["user" => $comment->user])</div>
            <div class="pt1"><b>{{ __('admin.' . $comment->statusName()) }}</b> · {{ nameOrDash($comment->user) }} · {{ $comment->created_at->diffForHumans() }}</div>
        </div>
        <div>{!! nl2br( strip_tags($comment->body)) !!} </div>
        @include('components.attachments', ["attachments" => $comment->attachments])
    </div>
@endforeach

<div class="comment bg-white p4 br1 mb2">
    <div class="date mb4">
        <div class="float-left mr3">@gravatar($lead->requester->email) </div>
        <div class="pt1"> <b>{{ __('admin.new') }}</b> · {{ $lead->created_at->diffForHumans() }}</div>
    </div>
    <div>{!! nl2br( strip_tags($lead->body)) !!} </div>
</div>