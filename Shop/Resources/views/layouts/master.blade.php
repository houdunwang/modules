<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8"/>
    <title>{{config_get('info.webname','','site')}}</title>
    <link rel="stylesheet" href="{{asset('modules/shop/css/app.css')}}?v={{\module()['version']}}">
    @include('layouts.hdjs')
    @stack('css')
</head>
<body class="shop">
@include('layouts.message')
@inject('ModuleRepository','App\Repositories\ModuleRepository')
<div class="header border-bottom border-primary">
    <div class="bg-light shadow pb-2 pt-2 border-bottom border-gary">
        <div class="container">
            <nav class="navbar navbar-expand-lg navbar-light bg-light">
                <a class="mr-5 text-primary navbar-brand" href="/">
                    <i class="fa fa-comments"></i> {{config_get('Shop.webname')}}
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo02"
                        aria-controls="navbarTogglerDemo02" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarTogglerDemo02">
                    <ul class="navbar-nav mr-auto mt-lg-0">
                        <li class="nav-item mr-3">
                            <a class="nav-link {{active_class(if_route_pattern('shop.front.module*'),'active')}}"
                               href="{{module_link('shop.front.module.index')}}">应用商店</a>
                        </li>
                        <li class="nav-item mr-3">
                            <a class="nav-link {{active_class(if_route_pattern('shop.front.log.index'),'active')}}"
                               href="{{module_link('shop.front.log.index')}}">更新日志</a>
                        </li>
                        <li class="nav-item mr-3">
                            <a class="nav-link " href="https://www.houdunren.com/document/front/article/1">在线手册</a>
                        </li>
                    </ul>
                    @auth()
                        <ul class="navbar-nav ">
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink"
                                   data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <i class="fa fa-w fa-user"></i> {{auth()->user()['name']}}
                                </a>
                                <div class="dropdown-menu dropdown-menu-right rounded-0"
                                     aria-labelledby="navbarDropdownMenuLink">
                                    <a class="dropdown-item" href="{{route('member')}}">个人中心</a>
                                    <a class="dropdown-item" href="{{route('member.info.index')}}">修改资料</a>
                                    <div class="dropdown-divider"></div>
                                    <a class="dropdown-item" href="{{route('logout')}}">退出登录</a>
                                </div>
                            </li>
                        </ul>
                    @endauth
                    @guest()
                        <div class="form-inline my-2 my-lg-0">
                            <a href="{{route('register')}}" class="btn btn-outline-primary btn-sm my-2 my-sm-0 mr-1">注册</a>
                            <a href="{{route('login')}}" class="btn btn-primary btn-sm my-2 my-sm-0">登录</a>
                        </div>
                    @endguest
                </div>
            </nav>
        </div>
    </div>
</div>
<div class="front {{route_class()}}">
    @yield('content')
</div>
<div class="container-fluid bg-dark">
    <div class="container">
        <div class="text-center p-5 text-secondary">
            我们的使命：帮助中小企业快速实现互联网价值,增长企业效益!11
            <hr>
            Copyright © 2010-2019 hdcms.com All Rights Reserved 京ICP备京ICP备12048441号-7
        </div>
    </div>
</div>
<script>
    require(['bootstrap'])
</script>
@stack('js')
</body>
</html>