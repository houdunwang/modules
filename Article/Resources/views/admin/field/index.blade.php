@extends('layouts.module')
@section('content')
    @include('article::admin.field._tab')
    <div class="card">
        <div class="card-header">
            设置 【{{$model['name']}}】字段
        </div>
        <div class="card-body">
            <table class="table">
                <thead>
                <tr>
                    <th>编号</th>
                    <th>表单描述</th>
                    <th>表单名称</th>
                    <th></th>
                </tr>
                </thead>
                <tbody>
                @foreach ($fields as $field)
                    <tr>
                        <td width="80">{{$field['id']}}</td>
                        <td>
                            {{$field['title']}}
                        </td>
                        <td>
                           {{$field['name']}}
                        </td>
                        <td class="text-right">
                            <div class="btn-group btn-group-sm" role="group" aria-label="Basic example">
                                <a href="{{module_link('article.admin.field.edit',[$model,$field])}}"
                                   class="btn btn-outline-success">编辑</a>
                                <form action="{{module_link('article.admin.field.destroy',[$model,$field])}}" method="post">
                                    @csrf @method('DELETE')
                                </form>
                                <a href="javascript:void(0);" class="btn btn-outline-danger"
                                   onclick="destroy(this,'确定删除【{{$field['title']}}】字段吗？')">
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
