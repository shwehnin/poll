@extends('layouts.home')
@section('content')
    <div class="container">
        <h4 class="center">
            {{$poll->title}}
        </h4>
        <h6>End in {{$poll->EndDateFormat}}</h6>
        <form action="{{route('polls.vote', [$poll])}}" method="post">
            @csrf
            @foreach($poll->options as $option)
                <p>
                    <label>
                        <input type="radio" name="option_id" value="{{$option->id}}" @if($selectedOption == $option->id) checked @endif>
                        <span>{{$option->content}} {{$option->votes_count}}</span>
                    </label>
                </p>
            @endforeach
            <button class="waves-effect waves-light btn info darken-2" type="submit">Vote</button>
        </form>
    </div>
@endsection
