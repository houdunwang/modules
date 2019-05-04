@extends('layouts.module')
@section('content')
    @include('edu::admin.system._tab')
    <form action="{{module_link('edu.admin.system.update',$model)}}" method="post">
        @csrf @method("PUT")
        @include('edu::admin.system._form')
    </form>
@stop