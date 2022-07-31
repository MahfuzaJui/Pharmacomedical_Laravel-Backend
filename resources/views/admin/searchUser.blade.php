@extends('layouts.appAdmin')
@section('contentAdmin')
<form action= "{{route('searchUser')}}" class "form-group" method = "GET">
    {{csrf_field()}}
    <table class = "table table-border">
        
        <div class="form-group p-1" >
            <label for="searched_users" ></label>
            <input type="search" name="searched_users">
            <div class="form-group p-1">
                <span>
                    <input type="submit" name="Search" value = "Search" class="btn btn-info">
                </span>
            </div>
        </div>
<table class = "table table-border">
        <tr>
            <th>Name</th>
            <th>Email</th>
            <th>Phone</th>
            
            <th>Date of Birth</th>
            <th>Gender</th>
            <th>Role</th>
        </tr>
        @foreach($user as $searched_users)
        <tr>
            <td>{{$searched_users->name}}</td>
            <td>{{$searched_users->email}}</td>
            <td>{{$searched_users->phoneNumber}}</td>
            
            <td>{{$searched_users->dob}}</td>
            <td>{{$searched_users->gender}}</td>
            <td>{{$searched_users->role}}</td>
            <td><a href="/editUser/{{$searched_users->name}}">Edit</a></td>
            <td><a href="/deleteUser/{{$searched_users->name}}">Delete</a></td>
        </tr>

        @endforeach
@endsection