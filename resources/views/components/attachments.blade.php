@if($attachments->count() )
    <div class="">
        @foreach( $attachments as $attachment)
            @icon(paperclip)
            <a href="{{ asset("storage/attachments/$attachment->path")}}" target="_blank">{{ $attachment->path }}</a>
            &nbsp;
        @endforeach
    </div>
@endif