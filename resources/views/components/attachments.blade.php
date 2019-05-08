@if($attachments && $attachments->count() )
    <div class="mt-2">
        @foreach( $attachments as $attachment)
            @iconMaterial(attach_file)
            <a href="{{ Storage::url("attachments/$attachment->path")}}" target="_blank">{{ $attachment->path }}</a>
        @endforeach
    </div>
@endif