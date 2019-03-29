@extends('layouts.module')
@section('content')
    @include('article::admin.model._tab')
    <form action="{{module_link('article.admin.model.store')}}" method="post">
        @csrf
        @include('article::admin.model._form')
    </form>
@stop