<!DOCTYPE html>
<html>
    @include('admin.includes.head')

<body class="hold-transition skin-green sidebar-mini">
<div class="wrapper">
   @include('admin.includes.navbar')
   @include('admin.includes.sidebar')
      @yield('content')
  <!-- /.content-wrapper -->
</div>
<!-- ./wrapper -->

   @include('admin.includes.foot')
<!-- REQUIRED JS SCRIPTS -->

<script rel="javascript" type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.2.3/jquery.min.js" integrity="sha384-I6F5OKECLVtK/BL+8iSLDEHowSAfUo76ZL9+kGAgTRdiByINKJaqTPH/QVNS1VDb" crossorigin="anonymous"></script>
<!-- Bootstrap 3.3.6 -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>
<!-- AdminLTE App -->
<script src="{{ URL::asset('assets/dist/js/app.min.js') }}"></script>
<script src="{{ URL::asset('assets/plugins/fastclick/fastclick.js') }}"></script>
<script src="{{ URL::asset('assets/plugins/slimScroll/jquery.slimscroll.min.js') }}"></script>

@section('js_assets')

@show

</body>
</html>