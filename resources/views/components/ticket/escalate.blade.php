@if($ticket->isEscalated() )
    <div class="p4 bg-danger white mt3 br1">
        {{ Form::open(["url" => route('tickets.escalate.destroy', $ticket), "method" => "delete" ]) }}
        @icon(flag) {!! __('ticket.escalatedDesc') !!}
        <button class="primary ml2">@icon(flag) {{ __('ticket.de-escalate') }}</button>
        {{ Form::close() }}
    </div>
@else
    <div class="float-right mt-2 mr4">
    {{ Form::open(["url" => route('tickets.escalate.store', $ticket) ]) }}
    <button class="secondary">@icon(flag) {{ __('ticket.escalate') }}</button>
    </div>
@endif
