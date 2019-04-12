@extends('layouts.module')
@section('content')
    <form action="{{module_link('blog.admin.article.store')}}" method="post">
        @csrf
        @include('blog::admin.article._form')
    </form>
@endsection