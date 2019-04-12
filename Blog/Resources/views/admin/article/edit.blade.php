@extends('layouts.module')
@section('content')
    <form action="{{module_link('blog.admin.article.update',$field)}}" method="post">
        @csrf @method('PUT')
        @include('blog::admin.article._form')
    </form>
@endsection