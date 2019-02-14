<!doctype html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ env('APP_KEY') }}">

    <title>Kwitansi & Invoice</title>

    {{--style--}}
    {!! Html::style('plugin/bootstrap/css/bootstrap.min.css') !!}
    {!! Html::style('plugin/font-awesome/css/all.min.css') !!}
    {!! Html::style('plugin/bootstrap-datetimepicker/bootstrap-datetimepicker.css') !!}
    @stack('pluginCss')
    {!! Html::style('css/custom.css') !!}
    @stack('css')

    {{--script--}}
    {!! Html::script('plugin/jquery.min.js') !!}
    {!! Html::script('plugin/jquery-validate/dist/jquery.validate.min.js') !!}
    {!! Html::script('plugin/moment/min/moment.min.js') !!}
    {!! Html::script('plugin/bootstrap/js/bootstrap.min.js') !!}
    {!! Html::script('plugin/bootstrap-datetimepicker/bootstrap-datetimepicker.js') !!}
    @stack('pluginJs')
</head>
<body>
<nav class="navbar navbar-inverse navbar-fixed-top">
    <div class="container-fluid">
        <ul class="nav navbar-nav">
            <li><a href="{!! url('/kwitansi') !!}">Kwitansi</a></li>
            <li><a href="{!! url('/invoice') !!}">Invoice</a></li>
        </ul>
    </div>
</nav>
<div class="container">
    @yield('content')
</div>
{!! Html::script('js/main.js') !!}
@stack('js')
</body>
</html>
