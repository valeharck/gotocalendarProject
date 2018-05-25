@extends('home.home')

@section('javascript')
    <script type="text/javascript" src="{{asset('js/calendar.js')}}" defer ></script>
    <script type="text/javascript" src="{{asset('js/fullcalendar-3.9.0/lib/moment.min.js')}}" defer></script>
    <script type="text/javascript" src="{{asset('js/fullcalendar-3.9.0/fullcalendar.js')}}" defer></script>
@endsection
@section('page')
    <div class="container mt-5 mb-5">
        <div id="calendar"></div>
    </div>
    <script type="text/javascript">
    </script>
@endsection