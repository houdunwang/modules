@extends('layouts.module')
@section('content')
    @include('article::admin.content._tab')
    <div class="card">
        <div class="card-header">
            文章列表
        </div>
        <div class="card-body">
            <table class="table">
                <thead>
                <tr>
                    <th>编号</th>
                    <th>标题</th>
                    <th>所属栏目</th>
                    <th>所属模型</th>
                    <th></th>
                </tr>
                </thead>
                <tbody>
                @foreach ($contents as $content)
                    <tr>
                        <td width="80">{{$content['id']}}</td>
                        <td>
                            {!! $content['title'] !!}
                        </td>
                        <td>
                            <a href="{{module_link('article.admin.category.edit',$content->category)}}">
                                {{$content->category->title}}
                            </a>
                        </td>
                        <td>
                            <a href="{{module_link('article.admin.model.edit',$content->category->models)}}">
                                {{$content->category->models->name}}
                            </a>
                        </td>
                        <td class="text-right">
                            <div class="btn-group btn-group-sm" role="group" aria-label="Basic example">
                                <a href="{{module_link('article.admin.content.edit',$content)}}"
                                   class="btn btn-outline-success">编辑</a>
                                <form action="{{module_link('article.admin.content.destroy',$content)}}" method="post">
                                    @csrf @method('DELETE')
                                </form>
                                <a href="javascript:void(0);" class="btn btn-outline-danger"
                                   onclick="destroy(this,'确定删除【{{$content['title']}}】文章吗？')">
                                    删除
                                </a>
                            </div>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
@stop

