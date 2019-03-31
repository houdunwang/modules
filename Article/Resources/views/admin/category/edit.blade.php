@extends('layouts.module')
@section('content')
    @include('article::admin.category._tab')
    <form action="{{module_link('article.admin.category.update',$category)}}" method="post">
        @csrf @method('PUT')
        @include('article::admin.category._form')
    </form>
@stop
