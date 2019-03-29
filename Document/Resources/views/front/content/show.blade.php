<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{$content['title']}}</title>
    @include('layouts.hdjs')
    <link rel="stylesheet" href="{{asset('modules/document/css/app.css')}}">
</head>
<body>
@include('components.login')
@includeIf(config_get('Document.topView'))
<div class="container mt-5 mb-5 {{route_class()}}">
    <div class="row">
        <div class="col-9">
            <div class="bg-white shadow-sm p-5 border rounded">
                <div class="border-bottom mb-3 pb-3">
                    <h5 class="pb-1 pt-3 mb-1 text-monospace text-black-50">
                        {{$content['title']}}
                    </h5>
                    <div class="small text-secondary clearfix">
                        <div class="float-left pt-2">
                            <i class="fa fa-file-text-o"></i>
                            <a href="{{module_link('document.front.article.show',$content->article)}}">
                                {{$content->article->title}}
                            </a>
                            <span class="pr-2 pl-2">/</span>
                            更新于{{$content->updated_at->diffForHumans()}}
                        </div>
                    </div>
                </div>
                <div class="markdown">
                    {!! \Parsedown::instance()->setBreaksEnabled(true)->text($content['markdown']) !!}
                </div>
                <div class="">
                    @include('components.favour',['model'=>$content,'avatar'=>true])
                    @push('js')
                        <script>
                            require(['hdjs', 'marked', 'MarkdownIt', 'highlight'], function (hdjs, marked, MarkdownIt) {
                                $('pre code').each(function (i, block) {
                                    hljs.configure({useBR: false});
                                    hljs.highlightBlock(block);
                                });
                            })
                        </script>
                    @endpush
                </div>
            </div>
        </div>
        <div class="col-3">
            @include('components.user',['user'=>$content->article->user])
            <script>
                require(['jquerySticky'],function(){
                    $("#jqueryPin").sticky({topSpacing:0});
                })
            </script>
            <div class="bg-white border p-2 shadow-sm" id="jqueryPin">
                <ul class="nav nav-tabs " id="myTab" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">章节列表</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">文档目录</a>
                    </li>
                </ul>
                <div class="tab-content" id="myTabContent">
                    <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                        <ul class="markdown-toc" style="max-height: 100vh;overflow-y: auto"></ul>
                    </div>
                    <div class="tab-pane fade article-menu" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                        <ul class="p-2" style="max-height: 100vh;overflow-y: auto">
                            @foreach($menus as $menu)
                                <li>
                                    @if ($menu['markdown'])
                                        <a href="{{module_link('document.front.content.show',$menu['id'])}}"
                                           class="{{active_class($menu['id']==$content['id'],'text-info')}}">
                                            {{$menu['title']}}
                                        </a>
                                    @else
                                        <span class="">{{$menu['title']}}</span>
                                    @endif
                                    <ul>
                                        @foreach($menu['_data'] as $m)
                                            <li>
                                                <a href="{{module_link('document.front.content.show',$m['id'])}}"
                                                   class="{{active_class($m['id']==$content['id'],'text-info')}}">
                                                    {{$m['title']}}
                                                </a>
                                            </li>
                                        @endforeach
                                    </ul>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@includeIf(config_get('Document.footerView'))
@stack('js')
<script>
markdown_toc('.markdown','.markdown-toc')
</script>
</body>
</html>