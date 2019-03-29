<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8"/>
    <title>{{config_get('Edu.webname')}}</title>
    @include('layouts.hdjs')
    @stack('css')
    <link rel="stylesheet" href="{{asset('modules/edu/css/app.css')}}?v={{\module()['version']}}">
</head>
<body class="edu">
@include('layouts.message')
@inject('ModuleRepository','App\Repositories\ModuleRepository')
@include('edu::layouts.header')
<div class="{{route_class()}} mb-3">
    @yield('content')
</div>
@include('edu::layouts.footer')
<script>
    require(['bootstrap'])
</script>
@stack('js')
</body>
</html>