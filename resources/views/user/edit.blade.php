@extends('layouts.app')
@section('content')
<div class="container">
    @if($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach($errors()->all as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif
    <div class="row">
        <form method="post" action="{{ action('TicketsController@update', $id) }}">
            <div class="form-group">
                <label for="title">Title</label>
                <input type="text" name="title" class="form-control" value="{{ $ticket->title }}" />
            </div>
            <div class="form-group">
                <label for="description">Description</label>
                <textarea class="form-control" name="description" cols="5" rows="5">{{ $ticket->description }}</textarea>
            </div>
            {{ csrf_field() }}
            {{ method_field('PATCH') }}
            <button type="submit" class="btn btn-success">Update Ticket</button>
        </form>
    </div>
</div>
@endsection