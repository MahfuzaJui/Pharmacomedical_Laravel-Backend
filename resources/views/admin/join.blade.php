@extends('layouts.appAdmin')
@section('contentAdmin')
<form action= "{{route('join')}}" class "form-group" method = "GET">
    {{csrf_field()}}
    <table class = "table table-border">
        
        <div class="form-group p-1" >
            <label for="search App" ></label>
            <input type="search" name="searched_apps">
            <div class="form-group p-1">
                <span>
                    <input type="submit" name="Search" value = "Search" class="btn btn-info">
                </span>
            </div>
        </div>
    <table class = "table table-border">
        <tr>
            <th>Application ID</th>
            <th>Doctor ID</th>
            <th>Doctor Name</th>
            <th>Patient ID</th>
            <th>Appointment Date & Time</th>
            <th>Purpose</th>
            
            <th>Link</th>
        </tr>
        @foreach($app as $app)
        <tr>
            <td>{{$app->appID}}</td>
            <td>{{$app->doctorID}}</td>
            <td>{{$app->name}}</td>
            <td>{{$app->userID}}</td>
            <td>{{$app->appointmentDateTime}}</td>
            <td>{{$app->purpose}}</td>
            
            
            <td><a href="{{$app->link}}">{{$app->link}}</a></td>

            
        
        </tr>
        @endforeach
@endsection