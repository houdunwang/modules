<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>【{{$content->article['title']}}】内容管理</title>
    @include('layouts.hdjs')
    @stack('css')
</head>
<body>
<div class="container-fluid p-0 {{route_class()}}">
    <nav class="navbar navbar-expand-lg navbar-light bg-light border-bottom">
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item active">
                    <div class="btn-group btn-group-sm float-right" role="group" aria-label="Basic example">
                        <a href="{{module_link('document.member.article.index')}}" class="btn btn-outline-success"><i
                                    class="fa fa-backward"></i> 返回</a>
                        <a href="{{module_link('document.front.content.show',$content)}}"
                           target="_blank" class="btn btn-outline-info">预览效果</a>
                        <small class="ml-3 pt-2 text-secondary">
                            系统每隔一秒会自动进行保存，目录请设置两级否则前台显示异常。
                        </small>
                    </div>
                </li>
            </ul>
        </div>
    </nav>
    @yield('content')
</div>
@stack('js')
</body>
</html>