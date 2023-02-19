@extends('layouts.home')
@section('content')
    <div class="container">
        <div class="row">
            <h2 class="center">Update Poll : {{$poll->title}}</h2>
            <form action="{{route('polls.update', [$poll])}}" method="post">
                @method('PUT')
                @csrf
                <div class="row">
                    <div class="input-field col s4">
                        <input type="text" name="title" class="validate" placeholder="Title" value="{{$poll->title}}">
                        <label for="">Title</label>
                        @error('title')
                        <p class="red-text">{{$message}}</p>
                        @enderror
                    </div>
                    <div class="input-field col s4">
                        <input placeholder="Start Date" name="start_date" type="text" class="datepicker validate" value="{{$poll->start_date}}">
                        <label for="start_date">Start Date</label>
                        @error('start_at')
                        <p class="red-text">{{$message}}</p>
                        @enderror
                    </div>
                    <div class="input-field col s4">
                        <input placeholder="Start Time" name="start_time" type="text" class="timepicker validate" value="{{$poll->start_time}}">
                        <label for="start_time">Start time</label>
                        @error('end_at')
                        <p class="red-text">{{$message}}</p>
                        @enderror
                    </div>
                    <div class="input-field col s4">
                        <input placeholder="End Date" name="end_date" type="text" class="datepicker validate" value="{{$poll->end_date}}">
                        <label for="end_date">End Date</label>
                    </div>

                    <div class="input-field col s4">
                        <input placeholder="End Time" name="end_time" type="text" class="timepicker validate" value="{{$poll->end_time}}">
                        <label for="end_time">End time</label>

                    </div>
                </div>
                <div class="row col s12" x-data="{
                    optionsNumber: {{count($poll->options)}},
                    options: {{json_encode($poll->options)}},
                    removeOption(id) {
                        if(this.optionsNumber == 2) {
                            alert('poll must has at least 2 options');
                            return;
                        }
                            this.options = this.options.filter(function(option) {
                                return option.id != id;
                            });

                            this.optionsNumber = this.options.length;
                        },
                        addOptions(){
                            this.options.push({id:Math.random()})
                        }
                }">
                    <h4>Options</h4>
                    <template x-for="option,i in options">
                        <div class="row">
                            <div class="col s6">
                                <input type="text" name="options[][content]" :placeholder="`Option `+ (i +1)" class="validate" :value="option.content">
                            </div>
                            <div class="col s6">
                                <button x-on:click="removeOption(option.id)" class="waves-effect waves-light btn red darken-4" type="button">Remove</button>
                            </div>
                        </div>
                    </template>
                    <button x-on:click="addOptions()" class="waves-effect waves-light btn cyan darken-2" type="button">Add Option</button>
                </div>
                <div class="center">
                    <button class="waves-effect waves-light btn cyan darken-2" type="submit">Submit</button>
                </div>
            </form>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            var dates = document.querySelectorAll('.datepicker');
            var instances = M.Datepicker.init(dates);
            var times = document.querySelectorAll('.timepicker');
            var instances = M.Timepicker.init(times);
        });
    </script>
@endsection
