<?php

namespace App\Http\Controllers;

use App\Repositories\TicketsRepository;
use App\Ticket;

class TicketsController extends Controller
{
    public function index(TicketsRepository $repository){
        if(request('assigned') )            $tickets = $repository->assignedToMe();
        else if(request('unsassigned') )    $tickets = $repository->unassigned();
        else if(request('recent'))          $tickets = $repository->recentlyUpdated();
        else if(request('closed'))          $tickets = $repository->closed();
        else                                $tickets = $repository->all();

        if( request('team'))                $tickets = $tickets->where('team_id', request('team'));

        $tickets = $tickets->select('tickets.*')->latest('updated_at');

        return view('tickets.index', ["tickets" => $tickets->paginate(25, ['tickets.user_id']) ]);
    }

    public function show(Ticket $ticket) {
        $this->authorize('view', $ticket);
        return view('tickets.show', ["ticket" => $ticket ]);
    }
}
