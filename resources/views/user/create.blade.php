@extends('layouts.app')
@section('content')
    <div class="container">
        @if($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif
        <div class="row">
            <form method="post" action="{{ url('/create/ticket') }}">
                <div class="form-group">
                    <label for="title">Title</label>
                    <input type="text" class="form-control" name="title" />
                    <input type="hidden" name="_token" value="{{ csrf_token() }}" />
                </div>
                <div class="form-group">
                    <label for="description">Description</label>
                    <textarea name="description" cols="5" rows="5" class="form-control"></textarea>
                </div>
                <button type="submit" class="btn btn-primary">Create</button>
            </form>
        </div>
    </div>
@stop