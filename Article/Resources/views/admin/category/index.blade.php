@extends('layouts.module')
@section('content')
    @include('article::admin.category._tab')
    <div class="card">
        <div class="card-header">
            栏目管理
        </div>
        <div class="card-body">
            <table class="table">
                <thead>
                <tr>
                    <th>编号</th>
                    <th>栏目名称</th>
                    <th>所属模型</th>
                    <th></th>
                </tr>
                </thead>
                <tbody>
                @foreach ($categories as $category)
                    <tr>
                        <td width="80">{{$category['id']}}</td>
                        <td>
                            {!! $category['_title'] !!}
                        </td>
                        <td>
                            <a href="{{module_link('article.admin.model.edit',$category->models)}}">
                                {!! $category->models->name !!}
                            </a>
                        </td>
                        <td class="text-right">
                            <div class="btn-group btn-group-sm" role="group" aria-label="Basic example">
                                <a href="{{module_link('article.admin.category.edit',$category)}}"
                                   class="btn btn-outline-success">编辑</a>
                                <form action="{{module_link('article.admin.category.destroy',$category)}}" method="post">
                                    @csrf @method('DELETE')
                                </form>
                                <a href="javascript:void(0);" class="btn btn-outline-danger"
                                   onclick="destroy(this,'确定删除【{{$category['title']}}】栏目吗？')">
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
