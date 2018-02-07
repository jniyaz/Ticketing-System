@extends('layouts.app')

@section('content')
<div class="container">
    @if(\Session::has('success'))
    <div class="alert alert-success">
        {{ \Session::get('success') }}
    </div>
    @endif
    <div class="row">
        <a href="{{ url('/tickets') }}" class="btn btn-primary">All Tickets</a>
        <a href="{{ url('/create/ticket') }}" class="btn btn-success">Create Ticket</a>
    </div>
    <hr>
    <div class="row">
        <table class="table table-striped">
            <thead>
                <tr>
                    <td>ID</td>
                    <td>Title</td>
                    <td>Description</td>
                    <td colspan="2">Action</td>
                </tr>
            </thead>
            <tbody>
                @foreach($tickets as $ticket)
                <tr>
                    <td>{{$ticket->id}}</td>
                    <td>{{$ticket->title}}</td>
                    <td>{{$ticket->description}}</td>
                    <td><a class="btn btn-sm btn-info" href="{{ action('TicketsController@edit', $ticket->id) }}">Edit</a></td>
                    <td>
                        <form method="post" action="{{ action('TicketsController@delete', $ticket->id) }}">
                            {{ csrf_field() }}
                            {{ method_field('DELETE') }}
                            <button class="btn btn-sm btn-danger">Delete</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
<div>
@endsection