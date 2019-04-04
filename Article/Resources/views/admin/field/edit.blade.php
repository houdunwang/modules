@extends('layouts.module')
@section('content')
    @include('article::admin.field._tab')
    <form action="{{module_link('article.admin.field.update',[$model,$field])}}" method="post">
        @csrf @method('PUT')
        @include('article::admin.field._form')
    </form>
@stop
