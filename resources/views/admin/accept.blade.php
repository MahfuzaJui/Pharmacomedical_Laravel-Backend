@extends('layouts.appAdmin')
@section('contentAdmin')
    <div class = "container">
    <br><br>
    <h1>Profile</h1>
    <form action= "{{route('accept')}}" class "form-group" method = "POST">
        {{csrf_field()}}
        <input type="hidden" name="userID" value="{{ $users['userID']; }}">
        <div class="form-group">
            <label for="verified">verified</label>
            <input type="text" class="form-control" id="verified" name="verified" placeholder="verified" value="true">
            
        </div>
        <div class="form-group">
            <label for="name">Name</label>
            <input type="text" class="form-control" id="name" name="name" placeholder="Enter name" value="{{$users->name}}">
            
        </div>
        <div class="form-group">
            <label for="email">Email address</label>
            <input type="email" class="form-control" id="email" name="email" placeholder="Enter email" value="{{$users->email}}">
           
        </div>
        <div class="form-group">
            <label for="phone">Phone No.</label>
            <input type="text" class="form-control" id="phone" name="phone" placeholder="Enter phone no." value="{{$users->phoneNumber}}">
            
        </div>
        <div class="form-group">
            <label for="role">Role</label>
            <input type="text" class="form-control" id="role" name="role" placeholder="Erole" value="{{$users->role}}">
            
        </div>
        <div class="form-group">
            <label for="password">Password</label>
            <input type="password" class="form-control" id="password" name="password" placeholder="Password" value="{{$users->password}}">
            
        </div>
        <div class="form-group">
            <label for="password_confirmation">Confirm Password</label>
            <input type="password" class="form-control" id="password_confirmation" name="password_confirmation" placeholder="Confirm Password" value="{{$users->password}}">
          
        </div>
        <div class="form-group">
            <label for="dob">Date of Birth</label>
            <input type="date" class="form-control" id="dob" name="dob" placeholder="Date of Birth" value="{{$users->dob}}">
          
        </div>
        <div class="form-group p-1" hidden>
            <label for="gender" >Gender</label>
            <input type="text" name="gender" value="{{$users->gender}}">
        </div>   
        <div class="form-group p-1">
            <span>
                <input type="submit" name="update" value="Accept" class="btn btn-info">
            </span>
        </div>
    </form>
    </div>
@endsection