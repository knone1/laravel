@extends('layouts.app')

@section('title', 'Home Page')

@section('meta_tag')

@endsection

@section('content')
      <div class="col-md-10 offset-md-1">
		  <div class="col-md-12">
		  <div class="card">
  <img class="card-img-top" src="http://i.imgur.com/wiBqjIF.jpg" width="100%" height="220px" alt="Card image cap">
  <div class="card-img-overlay" style="color: white;">

  <div class="text-xs-center" style="padding-top:70px;text-shadow: 5px 7px 11px #000;text-transform: uppercase;">
  	<h1 class="card-title">" {{ $links->title }} "</h1>
  	<i class="fa fa-facebook-official fa-lg" aria-hidden="true"></i> <i class="fa fa-twitter fa-lg" aria-hidden="true"></i>
  </div>

  </div>
  <div class="card-block text-xs-center">
    <h1 class="card-title" style="text-transform: uppercase;">{{ $links->title }}</h1>
    	{{ $links->created_at }}
   </div>
  <div class="card-block">
    <p class="card-text">
    	{{ $links->content }}
    </p>
    <p class="card-text">
  </div>




<div id="disqus_thread"></div>
  <script type="text/javascript">
    var disqus_shortname = 'testzzzz';
      var disqus_identifier = '{{ $links->title }}';
      var disqus_developer = 1;
      var disqus_url = 'http://bazztord.viewdns.net/blog/test-blog-4';
    (function() {
      var dsq = document.createElement('script');
      dsq.type = 'text/javascript';
      dsq.async = true;
      dsq.src = '//' + disqus_shortname + '.disqus.com/embed.js';
      (document.getElementsByTagName('head')[0] ||
        document.getElementsByTagName('body')[0]).appendChild(dsq);
    })();
  </script>
  <noscript>
    Please enable JavaScript to view the
    <a href="http://disqus.com/?ref_noscript">comments powered by Disqus.</a>
  </noscript>
  <a href="http://disqus.com" class="dsq-brlink">
    comments powered by <span class="logo-disqus">Disqus</span>
  </a>
    </p>
</div>
		</div>
      </div>
@endsection

@section('js_assets')
@parent

@endsection