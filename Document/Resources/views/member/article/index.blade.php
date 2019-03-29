@extends('layouts.member')
@section('content')
    @include('document::member.article._tab')

    <table class="table bg-white shadow-sm">
        <thead>
        <tr>
            <th>编号</th>
            <th>文档</th>
            <th>修改时间</th>
            <th></th>
        </tr>
        </thead>
        <tbody>
        @foreach ($articles  as $article)
            <tr>
                <td>{{$article['id']}}</td>
                <td>{{$article['title']}}</td>
                <td>{{$article['updated_at']}}</td>
                <td>
                    <div class="btn-group btn-group-sm float-right" role="group" aria-label="Basic example">
                        <a href="{{module_link('document.member.article.edit',$article)}}" class="btn btn-outline-success">编辑</a>
                        <a href="{{module_link('document.member.content.index',['aid'=>$article['id']])}}" class="btn btn-outline-secondary">内容</a>
                        <form action="{{module_link('document.member.article.destroy',$article)}}"
                              method="post">
                            @csrf @method('DELETE')
                        </form>
                        <a href="javascript:void(0);" class="btn btn-outline-danger" onclick="destroy(this)">删除</a>
                        <a href="{{module_link('document.front.article.show',$article)}}"
                          target="_blank" class="btn btn-outline-info">预览</a>
                    </div>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
    {{$articles->links()}}
@stop