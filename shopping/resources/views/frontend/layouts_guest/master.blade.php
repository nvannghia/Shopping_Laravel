<html>
    <head>
       
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="">
        <meta name="author" content="">
        @yield('title')
        <link href="{{ asset('Eshopper/css/bootstrap.min.css') }}" rel="stylesheet">
        <link href="{{ asset('Eshopper/css/font-awesome.min.css') }}" rel="stylesheet">
        <link href="{{ asset('Eshopper/css/prettyPhoto.css')}}" rel="stylesheet">
        <link href="{{ asset('Eshopper/css/price-range.css') }}" rel="stylesheet">
        <link href="{{ asset('Eshopper/css/animate.css') }}" rel="stylesheet">
        <link href="{{ asset('Eshopper/css/main.css') }}" rel="stylesheet">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
        
        @yield('css')

    </head>
    <body>
        @include('frontend.components_guest.header')
        @yield('content')
        @include('frontend.components_guest.footer')
    </body>
    <script src="{{ asset('Eshopper/js/jquery.js') }}"></script>
	<script src="{{ asset('Eshopper/js/bootstrap.min.js') }}"></script>
	<script src="{{ asset('Eshopper/js/jquery.scrollUp.min.js') }}"></script>
	<script src="{{ asset('Eshopper/js/price-range.js') }}"></script>
    <script src="{{ asset('Eshopper/js/jquery.prettyPhoto.js') }}"></script>
    <script src="{{ asset('Eshopper/js/main.js') }}"></script>

    @yield('js')
</html>