@extends('layouts.app')
@section('content')
    <div class="description">
        <h3>Tickets ( {{ $tickets->count() }} )</h3>
    </div>

    <div class="m4">
        <a class="button " href="{{ route("tickets.create") }}">@icon(plus) New Ticket</a>
        <a class="button secondary" id="mergeButton" onclick="onMergePressed()"> {{ __('ticket.merge') }}</a>
    </div>

    @paginator($tickets)

    <table class="striped">
        <thead>
            <tr>
                <th> {{ __('ticket.subject') }}</th>
                <th> {{ __('ticket.requester') }}</th>
                <th> {{ __('ticket.team') }}</th>
                <th> {{ __('ticket.assigned') }}</th>
                <th> {{ __('ticket.requested') }}</th>
                <th> {{ __('ticket.updated') }}</th>
            </tr>
        </thead>
        <tbody>
            @foreach($tickets as $ticket)
                @include('components.ticket.ticketHeader', ["ticket" => $ticket])
            @endforeach
        </tbody>
    </table>
    @paginator($tickets)
@endsection

@section('scripts')
    <script>
        var mergin = false;
        function onMergePressed(){
            if( ! mergin) {
                mergin = true;
                $("#mergeButton").removeClass("secondary");
                $("#mergeButton").html("{{__('ticket.mergeDesc')}}");
                return $(".selector").show();
            }

            var tickets = $("input[name^=selected]:checked").map(function() {
                return $(this).attr("meta:index");
            }).toArray();

            if(tickets.length == 0) return;

            var ticket = prompt("{{__('ticket.mergeDesc2')}}");

            $.post({
                url: "{{ route('tickets.merge.store') }}",
                data: {
                    "_token": "{{ csrf_token() }}",
                    "ticket_id" : ticket,
                    "tickets" : tickets
                },
                success: function(){
                    location.reload();
                }
            });
        }
    </script>
@endsection
