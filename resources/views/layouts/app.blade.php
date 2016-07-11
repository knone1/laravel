<!DOCTYPE html>
<html lang="en">
 @include('includes.head')
<body id="app-layout">
   @include('includes.navbar')
    @if (count($errors) > 0)
        <div class="alert alert-danger text-xs-center">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    @yield('content')

    <!-- JavaScripts -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.2.3/jquery.min.js" integrity="sha384-I6F5OKECLVtK/BL+8iSLDEHowSAfUo76ZL9+kGAgTRdiByINKJaqTPH/QVNS1VDb" crossorigin="anonymous"></script>
    <script src="/js/bootstrap.js"></script>
    @include('includes.footer')
</body>
</html>
