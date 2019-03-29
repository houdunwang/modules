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
                    <th></th>
                </tr>
                </thead>
                <tbody>
                @foreach ($categories as $category)
                    <tr>
                        <td scope="row">{{$category['id']}}</td>
                        <td>{{$category['title']}}</td>
                        <td class="text-right">
                            <div class="btn-group btn-group-sm" role="group" aria-label="Basic example">
                                <a href="{{module_link('article.admin.category.edit',$category)}}" class="btn btn-outline-success">编辑</a>
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
