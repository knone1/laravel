<nav class="navbar navbar-fixed-top navbar-light bg-white" style="border-bottom: 1px solid #e5e5e5;">
<div class="container">
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
      <a class="nav-link" href="https://github.com/knone1/laravel"><i class="fa fa-code-fork" aria-hidden="true"></i>fork <i class="fa fa-github-alt" aria-hidden="true"></i> @GITHUB</a></li>
    </li>
    <li class="nav-item">
    <a class="nav-link" href="{{ Facebook::getLoginUrl(['user_photos', 'public_profile', 'email', 'user_birthday', 'user_friends','user_about_me', 'user_likes', 'user_posts', 'user_relationships', 'user_videos', 'manage_pages']) }}">FB Login</a></li>
    <li class="nav-item">
      <a class="nav-link" href="{{ url('/login') }}">Login</a></li>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="{{ url('/register') }}">Register</a>
    </li>
    @else
                <li class="nav-item dropdown" style="margin-top: -10px">
                <a href="#" class="nav-link btn  dropdown-toggle" data-toggle="dropdown" id="dropdownMenu1" role="button" " aria-haspopup="true" aria-expanded="false">
                <img src="{{ isset(Auth::user()->profile->pic) ? Auth::user()->profile->pic : '' }}" width="20px" height="20px">&ensp;<span class="caret "></span>{{ Auth::user()->username }}</a>
                <ul class="nav-item dropdown-menu" aria-labelledby="dropdownMenu1">
                @if ( Auth::user()->isAdmin(Auth::user()->id) )
                <li><a class="nav-link dropdown-item" href="{{ route('admin.index') }}">Panel Admin</a></li>
                @endif
                  <li><a class="nav-item dropdown-item" href=""><i class="fa fa-btn fa-sign-out"></i>My Setting</a>
                  <li><a class="dropdown-item" href="{{ url('/logout') }}"><i class="fa fa-btn fa-sign-out"></i>Logout</a></li>

                  <li class="dropdown-divider">Nav header</li>
                  <li><a class="dropdown-item" href="#">Separated link</a></li>
                  <li><a class="dropdown-item" href="#">One more separated link</a></li>
                </ul>
              </li>
    @endif
  </ul>
</div>
</nav>