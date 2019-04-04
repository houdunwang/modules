@extends('layouts.module')
@section('content')
    @include('article::admin.field._tab')
    <form action="{{module_link('article.admin.field.store',$model)}}" method="post">
        @csrf
        @include('article::admin.field._form')
    </form>
@stop
