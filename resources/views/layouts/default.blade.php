<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>
        @yield('title','Sample') - laravel 01 学习
    </title>
    <link rel="stylesheet" type="text/css" href="/css/app.css">
    </meta>
</head>
<body>
@include('layouts._header')
<div class="container">
    <div class="col-md-offset-1 col-md-10">
        @yield('content')
        @include('layouts._footer')
    </div>
</div>
</body>
</html>