@extends('layouts.module')
@section('content')
    @include('edu::admin.tag._tab')
    <form action="{{module_link('edu.admin.tag.update',$tag)}}" method="post">
        @csrf @method("PUT")
        @include('edu::admin.tag._form')
    </form>
@stop