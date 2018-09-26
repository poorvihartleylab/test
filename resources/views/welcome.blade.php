<!doctype html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Laravel</title>
    <link href="{{ asset('css/style.css') }}" rel="stylesheet" type="text/css">
    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">
</head>
<body class="main-home">
    <div class="flex-center position-ref full-height main">
        <div class="top-right links">
            <a href="{{ route('login') }}">Login</a>
            <a href="{{ route('registeration') }}">Register</a>
        </div>
        <div class="main content">
            <div class="title m-b-md">
                My Clinic
            </div>
            <h1>My new file</h1>
        </div>
    </div>
</body>
</html>
