<nav class="navbar navbar-default navbar-bottom" role="navigation" style="background-color:#e4e4e4;">
  <div class="container text-xs-center">
  <div class="box-footer">
  <h1>Site Title</h1>

  </div>
  <div class="pull-left mt20" style="text-align: center; width:100%; ">

  Site Title® Laravel Software © Limited
  <br />
  <br />
          <span class="social-footer" style="color: #797a7d; ">
            
            <a class="light-up"  href="" title="Careers">Term of Use</a> |
            <a class="light-up" href="">Sitemap</a> |
            <a class="light-up" href="" title="Privacy Policy">Privacy Policy</a><br />
          </span>
        </div>
  </div>
</nav>
    <!-- JavaScripts -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
    <script src="https://www.atlasestateagents.co.uk/javascript/tether.min.js"></script>
    <script src="{{ URL::asset('js/bootstrap.js') }}"></script>


<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.lazyload/1.9.1/jquery.lazyload.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/modernizr/2.8.3/modernizr.min.js"></script>
@section('js_assets')

@show
<script type="text/javascript">
   if (window.location.hash && window.location.hash == '#_=_') {
        if (window.history && history.pushState) {
            window.history.pushState("", document.title, window.location.pathname);
        } else {
            // Prevent scrolling by storing the page's current scroll offset
            var scroll = {
                top: document.body.scrollTop,
                left: document.body.scrollLeft
            };
            window.location.hash = '';
            // Restore the scroll offset, should be flicker free
            document.body.scrollTop = scroll.top;
            document.body.scrollLeft = scroll.left;
        }
    }
</script>

<script type="text/javascript">
$(function() {
    $("img.lazy, img.thumb").lazyload({
        event : "sporty",
    	effect : "fadeIn"
    });
});

$(window).bind("load", function() {
    var timeout = setTimeout(function() {
        $("img.lazy, img.thumb").trigger("sporty")
    }, 1000);
});
$('.dropdown-toggle').dropdown()
    </script>