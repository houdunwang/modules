@extends('layouts.module')
@section('content')
    @include('article::admin.content._tab')
    <form action="{{module_link('article.admin.content.update',$content)}}" method="post">
        @csrf @method('PUT')
        @include('article::admin.content._form')
    </form>
@stop
