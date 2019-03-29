@extends('layouts.module')
@section('content')
    @include('article::admin.category._tab')
    <form action="{{module_link('article.admin.category.store')}}" method="post">
        @csrf
        @include('article::admin.category._form')
    </form>
@stop
