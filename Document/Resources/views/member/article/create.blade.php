@extends('layouts.member')
@section('content')
    @include('document::member.article._tab')
    <form action="{{route('document.member.article.store')}}" method="post">
        @csrf
        @include('document::member.article._form')
    </form>
@stop