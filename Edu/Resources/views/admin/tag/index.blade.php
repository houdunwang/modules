@extends('layouts.module')
@section('content')
    @include('edu::admin.tag._tab')
    <div class="card">
        <div class="card-header">
            标签列表
        </div>
        <div class="card-body">
            <table class="table table-responsive-sm">
                <thead class="thead-light small">
                <tr>
                    <th>编号</th>
                    <th>标签</th>
                    <th>分组名称</th>
                    <th></th>
                </tr>
                </thead>
                <tbody>
                @foreach($tags as $tag)
                    <tr>
                        <td>{{$tag['id']}}</td>
                        <td>{{$tag['name']}}</td>
                        <td>{{$tag['group']}}</td>
                        <td class="text-right">
                            <div class="btn-group btn-group-sm">
                                <a href="{{module_link('edu.admin.tag.edit',$tag)}}" class="btn btn-outline-success">
                                    编辑
                                </a>
                                <form action="{{module_link('edu.admin.tag.destroy',$tag)}}" method="post">
                                    @csrf @method('DELETE')
                                </form>
                                <a href="javascript:void(0);" onclick="destroy(this)" class="btn btn-outline-danger">删除</a>
                            </div>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
@stop