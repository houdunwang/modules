@extends('edu::layouts.master')
@section('content')
    @include('components.login')
    <div style="background: #313847">
        <div class="container">
            <div class="row">
                <div class="col-12 video">
                    {!! $blog['path'] !!}
                </div>
                @push('css')
                    <style>
                        .video iframe {
                            width: 100%;
                            min-height: 650px;
                        }
                    </style>
                @endpush
            </div>
        </div>
    </div>
    <div class="container p-0 p-sm-1">
        <div class="row mt-3">
            <div class="col-12">
                <div class="card-footer text-muted border bg-light mb-2 shadow-sm d-flex justify-content-between p-3">
                    <h5 class="text-black-50 text-uppercase">{{$blog->title}}</h5>
                    <div class="btn-group btn-group-sm float-right" role="group" aria-label="Basic example">
                        @can('update',$blog)
                            <a href="{{module_link('edu.member.blog.edit',$blog)}}"
                               class="btn btn-outline-success">编辑</a>
                        @endcan
                        @can('update',$blog)
                            <form action="{{module_link('edu.member.blog.destroy',$blog)}}" method="post">
                                @csrf @method('DELETE')
                            </form>
                            <a href="javascript:;" onclick="destroy(this)" class="btn btn-outline-danger">删除</a>
                        @endcan
                    </div>
                </div>
            </div>
            <div class="col-12 col-sm-12">
                @include('comment::layouts.comment',['model'=>$blog])
            </div>
        </div>
    </div>
@stop