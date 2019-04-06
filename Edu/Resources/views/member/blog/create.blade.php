@extends('layouts.member')
@section('content')
    @include('edu::member.blog._tab')
    <form action="{{module_link('edu.member.blog.store')}}" method="post">
        @csrf
        @include('edu::member.blog._form')
    </form>
@stop