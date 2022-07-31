@extends('layouts.appAdmin')
@section('contentAdmin')
    <div class = "container">
    <br><br>
        <h2>Add User</h2> 
            <form action="{{ route('addUser') }}" method="POST">  
                {{csrf_field()}}
                <div class="form-group">
                    <label for="name">Name</label>
                    <input type="text" class="form-control" id="name" name="name" placeholder="Enter name">
                    @error('name')
                        <span class="text-danger">{{$message}}</span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="email">Email address</label>
                    <input type="email" class="form-control" id="email" name="email" placeholder="Enter email">
                    @error('email')
                        <span class="text-danger">{{$message}}</span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="phone">Phone No.</label>
                    <input type="text" class="form-control" id="phone" name="phone" placeholder="Enter phone no.">
                    @error('phone')
                        <span class="text-danger">{{$message}}</span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="password">Password</label>
                    <input type="password" class="form-control" id="password" name="password" placeholder="Password">
                    @error('password')
                        <span class="text-danger">{{$message}}</span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="password_confirmation">Confirm Password</label>
                    <input type="password" class="form-control" id="password_confirmation" name="password_confirmation" placeholder="Confirm Password">
                    @error('password_confirmation')
                        <span class="text-danger">{{$message}}</span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="dob">Date of Birth</label>
                    <input type="date" class="form-control" id="dob" name="dob" placeholder="Date of Birth">
                    @error('dob')
                        <span class="text-danger">{{$message}}</span>
                    @enderror
                </div>
                <div class="form-group p-1">
                    <label for="role">Role</label>
                    <select name="role" id="role">
                        <option value="">Select Role</option>
                        <option value="admin">Admin</option>
                        <option value="doctor">Doctor</option>
                        <option value="patient">Patient</option>
                        <option value="pharmacist">Pharmacist</option>
                    </select>
                    @error('role')
                        <span class="text-danger">{{$message}}</span>
                    @enderror
                </div>    
                <div class="form-group p-1">
                    <label for="gender">Gender</label>
                    <input type="radio" name="gender" value="male">Male
                    <input type="radio" name="gender" value="female">Female
                    <input type="radio" name="gender" value="other">Other
                    @error('gender')
                        <span class="text-danger">{{$message}}</span>
                    @enderror
                </div>    
                <div class="form-group p-1">
                    <span>
                        <input type="submit" name="submit" value="Add" class="btn btn-info">
                    </span>
                </div>
                </div>
            </form> 
        </div>
        @endsection            