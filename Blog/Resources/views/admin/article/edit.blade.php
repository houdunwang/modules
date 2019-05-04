@extends('layouts.module')
@section('content')
    @include('blog::admin.article._tab')
    <form action="{{module_link('blog.admin.article.update',$model)}}" method="post">
        @csrf @method("PUT")
        @include('blog::admin.article._form')
    </form>
@stop