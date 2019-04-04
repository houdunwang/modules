@extends('layouts.module')
@section('content')
    @include('article::admin.content._tab')
    <form action="{{module_link('article.admin.content.store')}}" method="post">
        @csrf
        @include('article::admin.content._form')
    </form>
@stop
