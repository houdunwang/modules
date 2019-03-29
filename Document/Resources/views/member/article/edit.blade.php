@extends('layouts.member')
@section('content')
    @include('document::member.article._tab')
    <form action="{{route('document.member.article.update',$article)}}" method="post">
        @csrf @method('PUT')
        @include('document::member.article._form')
    </form>
@stop