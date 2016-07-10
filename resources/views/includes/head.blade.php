<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel - @yield('title')</title>
     @include('includes.head')
    <!-- Fonts -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css" integrity="sha384-XdYbMnZ/QjLh6iI4ogqCTaIjrFk87ip+ekIjefZch0Y+PvJ8CDYtEs1ipDmPorQ+" crossorigin="anonymous">
    <link href='https://fonts.googleapis.com/css?family=Roboto:900,900italic,700,700italic,400,400italic,300,300italic' rel='stylesheet' type='text/css'>
 	<link href="{{ URL::asset('bootstrap/dist/css/bootstrap.css') }}" rel="stylesheet"> 
 	<link href="{{ URL::asset('assets/css/style.css') }}" rel="stylesheet">
 	@section('css_assets')

	@show
</head>