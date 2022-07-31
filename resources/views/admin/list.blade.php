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
        <tr>
            <th>Name</th>
            <th>Email</th>
            <th>Phone</th>
            <th>Password</th>
            <th>Date of Birth</th>
            <th>Gender</th>
            <th>Role</th>
        </tr>
        @foreach($user as $user)
        <tr>
            <td>{{$user->name}}</td>
            <td>{{$user->email}}</td>
            <td>{{$user->phoneNumber}}</td>
            <td>{{$user->password}}</td>
            <td>{{$user->dob}}</td>
            <td>{{$user->gender}}</td>
            <td>{{$user->role}}</td>
            <td><a href="/editUser/{{$user->name}}">Edit</a></td>
            <td><a href="/deleteUser/{{$user->name}}">Delete</a></td>
            @if($user->verified =="banned" )
                {
                    <td><a href="/unban/{{$user->name}}">Unban</a></td>
                    
                }
            @else{
                <td><a href="/ban/{{$user->name}}">Ban</a></td>
            }
            @endif
        </tr>
        @endforeach
@endsection