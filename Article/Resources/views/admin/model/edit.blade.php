@extends('layouts.module')
@section('content')
    @include('article::admin.model._tab')
    <form action="{{module_link('article.admin.model.update',$model)}}" method="post">
        @csrf @method('PUT')
        @include('article::admin.model._form')
    </form>
@stop