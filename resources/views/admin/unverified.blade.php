@extends('layouts.appAdmin')
@section('contentAdmin')
<h2>Unverified Users List</h2>
    <table class = "table table-border">
        <tr>
            <th>Name</th>
            <th>Email</th>
            <th>Phone</th>
            <th>Date of Birth</th>
            <th>Gender</th>
            <th>Role</th>
        </tr>
        @foreach($users as $unverified)
        <tr>
            <td>{{$unverified->name}}</td>
            <td>{{$unverified->email}}</td>
            <td>{{$unverified->phoneNumber}}</td>
            <td>{{$unverified->dob}}</td>
            <td>{{$unverified->gender}}</td>
            <td>{{$unverified->role}}</td>
            <td><a href="/accept/{{$unverified->name}}">Accept</a></td>
            <td><a href="/decline/{{$unverified->name}}">Decline</a></td>
            <td><a href="/ban/{{$unverified->name}}">Ban</a></td>
        </tr>
        @endforeach
@endsection