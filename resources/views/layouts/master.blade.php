<html>
    <head>
     <title>Test - @yield('title')</title>
        <!-- Fonts -->
          <!-- Styles -->
 	<script type="text/javascript" src="{{ asset('js/jquery.min.js') }}"></script>
    <link href="{{ asset('css/style.css') }}" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    </head>
    <body>
        <nav class="navbar navbar-default">
            <div class="container-fluid">
                <ul class="nav navbar-nav">
                    <li><a href="{{ url('/login') }}">Login</a></li>
                    <li><a href="{{ url('/') }}">Register</a></li>
                </ul>
            </div>
        </nav>
    	 @yield('content')
    </body>
</html>