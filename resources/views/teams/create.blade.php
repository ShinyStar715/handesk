@extends('layouts.app')
@section('content')
    <div class="description">
        <a href="{{ url()->previous() }}">Teams</a>
        <h3>New Team</h3>
    </div>

    {{ Form::open(["url" => route('teams.store')]) }}
    <table class="w-50">
        <tr><td>{{ __("team.name") }}: </td><td><input class="w-100" name="name"  >                         </td></tr>
        <tr><td>{{ __("team.email") }}: </td><td><input class="w-100" name="email">                         </td></tr>
        <tr><td>{{ __("team.slack_webhook_url") }}:</td><td> <input class="w-100" name="slack_webhook_url" ></td></tr>
        <tr><td colspan="2"> <button class="uppercase"> @busy {{ __('team.new') }}</button>                 </td></tr>
    </table>
    {{ Form::close() }}

@endsection
