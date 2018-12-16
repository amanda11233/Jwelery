<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" ></script>
    <script src="{{asset('js/jquery.etalage.min.js')}}"></script>
    <script src = "{{asset('js/multi-carousel.js')}}"></script>
 

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
   
    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href = "{{asset('css/style.css')}}" rel = "stylesheet">
    <link rel="stylesheet" href="{{asset('css/etalage.css')}}" type="text/css" media="all" />
    <link rel = "stylesheet" href = "{{asset('css/multi-carousel.css')}}" >

</head>

<body>
    <div id="app">
      
@include('includes.nav')
   
            @yield('content')
            @include('includes.footer')
    </div>

    @yield('scripts')
</body>
</html>
