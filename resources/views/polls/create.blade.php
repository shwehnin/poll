@extends('layouts.home')
@section('content')
    <div class="container">
        <div class="row">
            <h2 class="center">New Poll</h2>
            <form action="" method="post">
                @csrf
                <div class="row">
                    <div class="input-field col s4">
                        <input type="text" name="title" class="validate" placeholder="Title" value="{{old('title')}}">
                        <label for="">Title</label>
                        @error('title')
                        <p class="red-text">{{$message}}</p>
                        @enderror
                    </div>
                    <div class="input-field col s4">
                        <input placeholder="Start Date" name="start_date" type="text" class="datepicker validate" value="{{old('start_date')}}">
                        <label for="start_date">Start Date</label>
                        @error('start_at')
                        <p class="red-text">{{$message}}</p>
                        @enderror
                    </div>
                    <div class="input-field col s4">
                        <input placeholder="Start Time" name="start_time" type="text" class="timepicker validate" value="{{old('start_time')}}">
                        <label for="start_time">Start time</label>
                        @error('end_at')
                        <p class="red-text">{{$message}}</p>
                        @enderror
                    </div>
                    <div class="input-field col s4">
                        <input placeholder="End Date" name="end_date" type="text" class="datepicker validate" value="{{old('end_date')}}">
                        <label for="end_date">End Date</label>
                    </div>

                    <div class="input-field col s4">
                        <input placeholder="End Time" name="end_time" type="text" class="timepicker validate" value="{{old('end_time')}}">
                        <label for="end_time">End time</label>

                    </div>
                </div>
                <div class="row col s12" x-data="{
                    optionsNumber: 2
                }">
                    <h4>Options</h4>
                    <template x-for="i, option in optionsNumber">
                        <div class="row">
                            <div class="col s6">
                                <input type="text" name="options[][content]" :placeholder="`Option `+i" class="validate">
                            </div>
                            <div class="col s6">
                                <button x-on:click="optionsNumber > 2 ? optionsNumber-- : alert('poll must has at least 2 options')" class="waves-effect waves-light btn red darken-4" type="button">Remove</button>
                            </div>
                        </div>
                    </template>
                    <button x-on:click="optionsNumber++" class="waves-effect waves-light btn cyan darken-2" type="button">Add Option</button>
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
