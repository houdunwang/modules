@extends('layouts.module')
@inject('fieldServer','App\Servers\FieldServer')
@section('content')
    @include('blog::admin.article._tab')
    <div class="card">
        <div class="card-header">文章列表</div>
        <div class="card-body">
            <table class="table">
                <thead>
                <tr>
                    <th width="80">编号</th>
                    @foreach($fieldServer->getFieldTitles(module(),'BlogArticle') as $title)
                        <th>{{$title}}</th>
                    @endforeach
                    <th></th>
                </tr>
                </thead>
                <tbody>
                @foreach ($data as $field)
                    <tr>
                        <td>{{$field['id']}}</td>
                        @foreach($fieldServer->getFieldValues(module(),'BlogArticle',$field) as $title)
                            <td>{!! $title !!}</td>
                        @endforeach
                        <td class="text-right">
                            <div class="btn-group btn-group-sm" role="group" aria-label="Basic example">
                                <a href="{{module_link('blog.admin.article.edit',$field)}}"
                                   class="btn btn-outline-success">编辑</a>

                                <form action="{{module_link('blog.admin.article.destroy',$field)}}" method="post">
                                    @csrf @method('DELETE')
                                </form>
                                <a href="javascript:void(0);" class="btn btn-outline-danger"
                                   onclick="destroy(this,'确定删除吗？')">
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

