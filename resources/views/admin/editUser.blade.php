@extends('layouts.appAdmin')
@section('contentAdmin')
    <div class = "container">
    <br><br>
     <h1>Edit User</h1>
     <form action= "{{route('editUser')}}" class "form-group" method = "post">
        {{csrf_field()}}
        <div class="form-group">
            <label for="name">Name</label>
            <input type="text" class="form-control" id="name" name="name" placeholder="Enter name" value="{{$user->name}}">
            @error('name')
                <span class="text-danger">{{$message}}</span>
            @enderror
        </div>
        <div class="form-group">
            <label for="email">Email address</label>
            <input type="email" class="form-control" id="email" name="email" placeholder="Enter email" value="{{$user->email}}">
            @error('email')
                <span class="text-danger">{{$message}}</span>
            @enderror
        </div>
        <div class="form-group">
            <label for="phone">Phone No.</label>
            <input type="text" class="form-control" id="phone" name="phone" placeholder="Enter phone no." value="{{$user->phoneNumber}}">
            @error('phone')
                <span class="text-danger">{{$message}}</span>
            @enderror
        </div>
        <div class="form-group">
            <label for="password">Password</label>
            <input type="password" class="form-control" id="password" name="password" placeholder="Password" value="{{$user->password}}">
            @error('password')
                <span class="text-danger">{{$message}}</span>
            @enderror
        </div>
        <div class="form-group">
            <label for="password_confirmation">Confirm Password</label>
            <input type="password" class="form-control" id="password_confirmation" name="password_confirmation" placeholder="Confirm Password" value="{{$user->password}}">
            @error('password_confirmation')
                <span class="text-danger">{{$message}}</span>
            @enderror
        </div>
        <div class="form-group">
            <label for="dob">Date of Birth</label>
            <input type="date" class="form-control" id="dob" name="dob" placeholder="Date of Birth" value="{{$user->dob}}">
            @error('dob')
                <span class="text-danger">{{$message}}</span>
            @enderror
        </div>
        <div class="form-group p-1" hidden>
            <label for="gender" >Gender</label>
            <input type="text" name="gender" value="{{$user->gender}}">
        </div>    
        <div class="form-group p-1">
            <span>
                <input type="submit" name="update" value="Update" class="btn btn-info">
            </span>
        </div>
    </form>
    </div>
@endsection