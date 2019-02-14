<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <title>{{ $title }}</title>
    <link href="{!! asset('css/print-media.css') !!}" rel="stylesheet">
    @stack('css')
</head>
<body>


<div id="header">
    @yield('header')
</div>

<div id="footer">
    @yield('footer')
</div>

@yield('content')
</body>
</html>