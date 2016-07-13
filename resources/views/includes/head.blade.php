<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel - @yield('title')</title>

    <!-- Fonts -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css" integrity="sha384-XdYbMnZ/QjLh6iI4ogqCTaIjrFk87ip+ekIjefZch0Y+PvJ8CDYtEs1ipDmPorQ+" crossorigin="anonymous">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Lato:100,300,400,700">
    <!-- Styles -->
    <link href="/css/bootstrap.css" rel="stylesheet">
 	<link href="{{ URL::asset('assets/css/style.css') }}" rel="stylesheet"> 

@section('css_assets')
<style type="text/css">
	.grow img {
  width: 100%;
  height: 180px;
}
 
.lazy{
            display: block;
            height: 180px;
            width: 100%;
            background-position: center center;
            background-repeat: no-repeat;
        }
</style>
@show

</head>