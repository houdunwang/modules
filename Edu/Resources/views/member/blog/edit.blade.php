@extends('layouts.member')
@section('content')
    @include('edu::member.blog._tab')
    <form action="{{module_link('edu.member.blog.update',$blog)}}" method="post">
        @csrf @method('PUT')
        @include('edu::member.blog._form')
    </form>
@stop