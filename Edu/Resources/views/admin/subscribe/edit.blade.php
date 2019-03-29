@extends('layouts.module')
@section('content')
    @include('edu::admin.subscribe._tab')
    <form action="{{module_link('edu.admin.subscribe.update',$subscribe)}}" method="post">
        @csrf @method('PUT')
        @include('edu::admin.subscribe._form')
    </form>
@stop