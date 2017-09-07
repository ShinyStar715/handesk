<div class="sidebar">
    <img src="{{ url("/images/handesk_small.png") }}">
    <h4> @icon(inbox) {{ trans_choice('ticket.ticket', 2) }}</h4>
    <ul>
        @php ( $repository = new App\Repositories\TicketsRepository ) @endphp
        @if( auth()->user()->assistant )
            @include('components.sidebarItem', ["url" => route('tickets.index') . "?escalated=true",    "title" => __('ticket.escalated'),  "count" => $repository->escalated()     ->count()])
        @endif
        @include('components.sidebarItem', ["url" => route('tickets.index') . "?all=true",          "title" => __('ticket.open'),       "count" => $repository->all()               ->count()])
        @include('components.sidebarItem', ["url" => route('tickets.index') . "?unassigned=true",   "title" => __('ticket.unassigned'), "count" => $repository->unassigned()        ->count()])
        @include('components.sidebarItem', ["url" => route('tickets.index') . "?assigned=true",     "title" => __('ticket.myTickets'),  "count" => $repository->assignedToMe()      ->count()])
        @include('components.sidebarItem', ["url" => route('tickets.index') . "?recent=true",       "title" => __('ticket.recent'),     "count" => $repository->recentlyUpdated()   ->count()])
        @include('components.sidebarItem', ["url" => route('tickets.index') . "?solved=true",       "title" => __('ticket.solved')])
        @include('components.sidebarItem', ["url" => route('tickets.index') . "?closed=true",       "title" => __('ticket.closed')])
    </ul>

    <br>
    <h4> @icon(dot-circle-o) {{ trans_choice('lead.lead', 2) }}</h4>
    <ul>
        @php $repository = new App\Repositories\LeadsRepository @endphp
        @include('components.sidebarItem', ["url" => route('leads.index'). "?all=true",         "title" => trans_choice('lead.lead',        2), "count" => $repository->all()           ->count()] )
        @include('components.sidebarItem', ["url" => route('leads.index'). "?mine=true",        "title" => trans_choice('lead.mine',        2), "count" => $repository->assignedToMe()  ->count()] )
        @include('components.sidebarItem', ["url" => route('tasks.index'),                      "title" => __('lead.todayTasks'),               "count" => auth()->user()->todayTasks() ->count()] )
        @include('components.sidebarItem', ["url" => route('leads.index'). "?completed=true",   "title" => trans_choice('lead.completed',   2) ])
        @include('components.sidebarItem', ["url" => route('leads.index'). "?failed=true",      "title" => trans_choice('lead.failed',      2) ])
    </ul>

    <br>
    <h4> @icon(bar-chart) {{ trans_choice('report.report', 2) }}</h4>
    <ul>
        @include('components.sidebarItem', ["url" => route('reports.index'), "title" => trans_choice('report.report', 2) ])
    </ul>

    <br>
    <h4> @icon(cog) {{ trans_choice('admin.admin',2) }}</h4>
    <ul>
        @include('components.sidebarItem', ["url" => route('teams.index'),      "title" => trans_choice('team.team',        2) ])
        @if(auth()->user()->admin)
            @include('components.sidebarItem', ["url" => route('users.index'),      "title" => trans_choice('ticket.user',      2) ])
            @include('components.sidebarItem', ["url" => route('settings.edit', 1), "title" => trans_choice('setting.setting',  2) ])
        @endif
    </ul>
    <br><br>
</div>