<!DOCTYPE html>
<html>
    @include('admin.includes.head')

<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">
   @include('admin.includes.navbar')
   @include('admin.includes.sidebar')
      @yield('content')
  <!-- /.content-wrapper -->
</div>
<!-- ./wrapper -->

   @include('admin.includes.foot')
<!-- REQUIRED JS SCRIPTS -->

<!-- jQuery 2.2.3 -->
<script src="{{ URL::asset('assets/plugins/jQuery/jquery-2.2.3.min.js') }}"></script>
<!-- Bootstrap 3.3.6 -->
<script src="{{ URL::asset('assets/bootstrap/js/bootstrap.min.js') }}"></script>
<!-- AdminLTE App -->
<script src="{{ URL::asset('assets/dist/js/app.min.js') }}"></script>
</body>
</html>

@section('js_assets')
@parent

@endsection