<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{$article['title']}}</title>
    @include('layouts.hdjs')
</head>
<body>
@includeIf(config_get('Document.topView'))
<div class="container mt-5 mb-5">
    <div class="row">
        <div class="col-12 bg-white shadow-sm rounded p-3">
            <h2 class="text-black-50">{{$article['title']}}</h2>
            <hr>
            @foreach($menus as $menu)
                <div class="border bg-white mb-3 p-2">
                    @if ($menu['markdown'])
                        <a href="{{module_link('document.front.content.show',$menu['id'])}}"
                           class="d-block">
                            <i class="fa fa-file-text-o"></i> {{$menu['title']}}
                        </a>
                    @else
                        <span class="d-block">
                            <i class="fa fa-file-text-o"></i> {{$menu['title']}}
                        </span>
                    @endif
                    @foreach($menu['_data'] as $m)
                        <a href="{{module_link('document.front.content.show',$m['id'])}}"
                           class="d-block border p-2 m-3">
                            <i class="fa fa-file-text-o"></i> {{$m['title']}}
                        </a>
                    @endforeach
                </div>
            @endforeach
        </div>
    </div>
</div>
@includeIf(config_get('Document.footerView'))
<style>
    .border {
        border: solid 1px #eae7e7 !important;
    }
</style>
</body>
</html>