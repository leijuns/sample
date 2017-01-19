<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>@yield('title')</title>
    <link rel="stylesheet" href="/css/app.css">
</head>
<body>
    <div class="container">

        @include('layouts._header')
        @yield('content')

    </div>
    @include('layouts._footer')
    <script src="/js/app.js"></script>
</body>
</html>