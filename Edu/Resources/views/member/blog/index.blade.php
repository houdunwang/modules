@extends('layouts.member')
@section('content')
    @include('edu::member.blog._tab')
    <div class="row">
        @foreach($blogs as $blog)
            <div class="col-4 mt-2">
                <div class="card rounded shadow-sm">
                    <div class="card-body text-center">
                        {{$blog['title']}}
                    </div>
                    <div class="card-footer text-center">
                        <div class="btn-group btn-group-sm" role="group" aria-label="Basic example">
                            <a href="{{module_link('edu.member.blog.edit',$blog)}}" class="btn btn-outline-success">编辑</a>
                            <form action="{{module_link('edu.member.blog.destroy',$blog)}}" method="post">
                                @csrf @method('DELETE')
                            </form>
                            <a href="javascript:;" onclick="destroy(this)" class="btn btn-outline-danger">删除</a>
                            <a href="{{module_link('edu.front.blog.show',$blog)}}" class="btn btn-outline-info">预览</a>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
    <div class="mt-2">
        {{$blogs->links()}}
    </div>
@stop