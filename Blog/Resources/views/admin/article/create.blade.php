@extends('layouts.module')
@section('content')
    @include('blog::admin.article._tab')
    <form action="{{module_link('blog.admin.article.store')}}" method="post">
        @csrf
        @include('blog::admin.article._form')
    </form>
@stop