<html>
    <head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    </head>
    <body>
        <div class="container" style="width:500px;">  
        <h2>Registration</h2> 
            <form action="{{ route('registration') }}" method="POST">  
                {{csrf_field()}}
                <div class="form-group">
                    <label for="name">Name</label>
                    <input type="text" class="form-control" id="name" name="name" placeholder="Enter name">
                    @error('name')
                        <span class="text-danger">{{$message}}</span>
                    @enderror
                </div>
                <div class="form-group" hidden>
                    <label for="verified">verified</label>
                    <input type="text" class="form-control" id="verified" name="verified" placeholder="verified" value="false">
                    
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
                    <label for="gender">Gender</label>
                    <input type="radio" name="gender" value="male">Male
                    <input type="radio" name="gender" value="female">Female
                    <input type="radio" name="gender" value="other">Other
                    @error('gender')
                        <span class="text-danger">{{$message}}</span>
                    @enderror
                </div>
                <div class="form-group p-1">
                    <label for="role">Role</label>
                    <select name="role" id="role">
                        <option value="">Select Role</option>
                      
                        <option value="doctor">Doctor</option>
                        <option value="patient">Patient</option>
                        <option value="pharmacist">Pharmacist</option>
                    </select>
                    @error('role')
                        <span class="text-danger">{{$message}}</span>
                    @enderror
                </div>    
                <div class="form-group p-1">
                    <span>
                        <input type="submit" name="submit" value="Sign up" class="btn btn-info">
                    </span>
                </div>
                <div class="form-group p-1">
                    <span>
                        Already have an account? <a href="{{route('login')}}">Sign in</a>
                    </span>
                </div>
            </form> 
        </div>
    </body>
</html>        