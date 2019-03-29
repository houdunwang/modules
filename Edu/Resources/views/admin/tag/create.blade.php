@extends('layouts.module')
@section('content')
    @include('edu::admin.tag._tab')
    <form action="{{module_link('edu.admin.tag.store')}}" method="post">
        @csrf
        @include('edu::admin.tag._form')
    </form>
@stop