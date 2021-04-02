<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <title>@yield('title')</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">
        <link rel="stylesheet" href="/css/app.css">
        <link rel="stylesheet" href="/css/bootstrap.min.css">
        
        <link rel="stylesheet" href="/css/chosen-bootstrap.css">
        <link rel="stylesheet" href="/css/chosen.min.css">
        <link rel="stylesheet" href="/css/jquery.loadingModal.css">
        
        @yield('plugin_css')
        <link rel="stylesheet" href="/css/main.css">
        
        <!-- Styles -->
        <style>
            @yield('style')
        </style>
    </head>
    <body>
        @include('layouts.nav')
        <div class="container _auth">
            <div class="row">
                @auth
                    @include('layouts.sidebar')
                    <div class="col-md-9">
                        @include('layouts.user_info')
                        @yield('content')
                    </div>
                @else
                    <div class="col-md-12">
                        @yield('content')
                    </div>
                @endauth
                
            </div>
        </div>
            
        <script type="text/javascript" src="/js/jquery-3.3.1.min.js"></script>
        <script type="text/javascript" src="/js/bootstrap.min.js"></script>
        <script type="text/javascript" src="/js/jquery.validate.min.js"></script>
        <script type="text/javascript" src="/js/additional-methods.min.js"></script>
        <script type="text/javascript" src="/js/chosen.jquery.min.js"></script>
        <script type="text/javascript" src="/js/chosen.order.jquery.min.js"></script>
        <script type="text/javascript" src="/js/jquery.loadingModal.min.js"></script>
        <script type="text/javascript" src="/js/tableHeadFixer.js"></script>
        @yield('plugin_js')
        @yield('script')
    </body>
</html>
