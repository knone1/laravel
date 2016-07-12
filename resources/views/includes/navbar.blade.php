<div class="container">
<nav class="navbar navbar-light bg-white">
  <a class="navbar-brand" href="#">Navbar</a>
  <ul class="nav navbar-nav">
    <li class="nav-item active">
      <a class="nav-link" href="/">Home <span class="sr-only">(current)</span></a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="#">Features</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="#">Pricing</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="#">About</a>
    </li>
  </ul>
  <ul class="nav navbar-nav pull-xs-right">
    @if (Auth::guest())
    <li class="nav-item">
    <a class="nav-link" href="{{ Facebook::getLoginUrl(['user_photos', 'public_profile', 'email', 'user_birthday', 'user_friends','user_about_me', 'user_likes', 'user_posts', 'user_relationships', 'user_videos', 'manage_pages']) }}">FB Login</a></li>
    <li class="nav-item">
      <a class="nav-link" href="{{ url('/login') }}">Login</a></li>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="{{ url('/register') }}">Register</a>
    </li>
    @else
                <li class="nav-item dropdown">
                <a href="#" class="nav-link btn  dropdown-toggle" data-toggle="dropdown" id="dropdownMenu1" role="button" style="font-size:1rem;" aria-haspopup="true" aria-expanded="false">
                <img src="{{ Auth::user()->pic }}" width="34px" height="34px" style="margin: -7px 0;display:inline-block;vertical-align:top;">&ensp;<span class="caret "></span>{{ Auth::user()->username }}</a>
                <ul class="dropdown-menu" aria-labelledby="dropdownMenu1">
                @if ( Auth::user()->isAdmin(Auth::user()->id) )
                <li><a class="dropdown-item" href="{{ route('admin.index') }}">Panel Admin</a></li>
                @endif
                  <li><a class="dropdown-item" href=""><i class="fa fa-btn fa-sign-out"></i>My Setting</a>
                  <li><a class="dropdown-item" href="{{ url('/logout') }}"><i class="fa fa-btn fa-sign-out"></i>Logout</a></li>

                  <li class="dropdown-divider">Nav header</li>
                  <li><a class="dropdown-item" href="#">Separated link</a></li>
                  <li><a class="dropdown-item" href="#">One more separated link</a></li>
                </ul>
              </li>
    @endif
  </ul>
</nav>
</div>