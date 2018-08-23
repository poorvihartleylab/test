<html>
    <head>
        <title>@yield('title')</title>

    </head>

    <body>
        <div class="container">
   		@yield('content')
        </div>
         @section('sidebar')
            This is the master sidebar.
        @show
        {{foo}}
    </body>
</html>


