@if(Session::get('user')) {{Session::get('user')}}
  <a class button class="btn btn-danger" href="{{route('logout')}}">Logout</a>
 @endif