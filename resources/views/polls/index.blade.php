@extends('layouts.home')
@section('content')
    <div class="container">
        <h2 class="center">Poll Lists</h2>
        <div class="row">
            <a href="{{route('polls.create')}}" class="waves-effect waves-light btn info darken-2">New Poll</a>
            <a href="{{route('dashboard')}}" class="waves-effect waves-light btn primary darken-2">Home</a>
        </div>
        <table class="centered">
            <thead>
                <tr>
                    <th>Title</th>
                    <th>Status</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach($polls as $poll)
                    <tr>
                        <td>{{$poll->title}}</td>
                        <td>{{$poll->status}}</td>
                        <td>
                            <a href="{{route('polls.edit', [$poll])}}" class="waves-effect waves-light btn info darken-2">Update</a>
                            <a href="{{route('polls.delete', [$poll])}}" class="waves-effect waves-light btn red darken-2">Delete</a>
                            <a href="{{route('polls.show', [$poll])}}" class="waves-effect waves-light btn green lighten-0">Show</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

@endsection
