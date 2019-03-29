@extends('layouts.module')
@section('content')
    @include('article::admin.model._tab')
    <div class="card">
        <div class="card-header">
            模型管理
        </div>
        <div class="card-body">
            <table class="table">
                <thead>
                <tr>
                    <th>编号</th>
                    <th>模型名称</th>
                    <th></th>
                </tr>
                </thead>
                <tbody>
                @foreach ($models as $model)
                    <tr>
                        <td scope="row">{{$model['id']}}</td>
                        <td>{{$model['name']}}</td>
                        <td class="text-right">
                            <div class="btn-group btn-group-sm" role="group" aria-label="Basic example">
                                <a href="{{module_link('article.admin.model.edit',$model)}}" class="btn btn-outline-success">编辑</a>
                                <a href="" class="btn btn-outline-danger">删除</a>
                            </div>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
@stop