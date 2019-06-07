@foreach($lead->statusUpdates as $comment)
    <div class="comment pb-4 mb-3 border-bottom">
        <div class="avatar pr-3">@include('components.gravatar',["user" => $comment->user])</div>
        <div class="comment-text-wrap">
            <div class="status-wrap font-italic text-secondary"><span class="status font-weight-bold">{{ $comment->status()->name }}</span> · {{ nameOrDash($comment->user) }} · {{ $comment->created_at->diffForHumans() }}</div>
            <div class="pt-2">{!! nl2br( strip_tags($comment->body)) !!} </div>
        </div>

        @include('components.attachments', ["attachments" => $comment->attachments])
    </div>
@endforeach