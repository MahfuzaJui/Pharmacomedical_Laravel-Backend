

<html>
    <head>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css" integrity="sha384-DyZ88mC6Up2uqS4h/KRgHuoeGwBcD4Ng9SiP4dIRy0EXTlnuz47vAwmeGwVChigm" crossorigin="anonymous"/>
    </head>
    <body>
        <div class="container mt-5"; style="width:500px; border-style: outset;  background-color: #EBEDEF;" > 
        <h2><b>Log in</b></h2> 
        @if(Session::has('error'))
        <div class="alert alert-danger">
            {{Session::get('error')}}
        </div>
        @endif
        @if(Session::has('error1'))
        <div class="alert alert-danger">
            {{Session::get('error1')}}
        </div>
        @endif
        <form action="{{route('login')}}" method="post">
            {{@csrf_field()}}
            <div class="form-group">
                <label for="email">Email address</label>
                <input type="email" class="form-control" id="email" name="email" placeholder="Enter email">
                @error('email')
                    <span class="text-danger">{{$message}}</span>
                @enderror
            </div>
            <div class="form-group">
                <label for="name">Password</label>
                <input type="password" class="form-control" id="password" name="password" placeholder="Password">
                <input type="checkbox" name="remember">Remember Me<br>
                @error('password')
                    <span class="text-danger">{{$message}}</span>
                @enderror
            </div>
            <div class="form-group p-1">
                <span>
                    <input type="submit" name="submit" value="Login" class="btn btn-primary" style="background-color: #0f57cd; padding: 10px; width: 100%;">
                    Don't have an account? <a href="{{route('registration')}}">sign-up</a>
                </span>
            </div>
            <div class="form-group p-1">
                <span>
                    <a href="{{url('auth/facebook')}}" class="btn btn-primary" style="background-color: #3b5998; padding: 10px; width: 100%;" href="#!" role="button">
                    <i class="fab fa-facebook"></i> Login With Facebook</a>
                </span>
            </div>
            <div class="form-group p-1">
                <span>
                    <a href="{{url('auth/google')}}" class="btn btn-danger" style="background-color: #d34836; padding: 10px; width: 100%;" href="#!" role="button">
                    <i class="fab fa-google-plus-g"></i> Login With Google</a>
                </span>
            </div>
        </form>
        </div>
    </body>
</html>
