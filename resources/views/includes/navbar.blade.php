<div class="container">
<nav class="navbar navbar-light bg-faded">
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
    <li class="nav-item">
      <a class="nav-link" href="#">Pricing</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="#">About</a>
    </li>
    @endif
  </ul>
</nav>
</div>