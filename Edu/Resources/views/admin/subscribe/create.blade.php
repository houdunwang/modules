@extends('layouts.module')
@section('content')
    @include('edu::admin.subscribe._tab')
    <form action="{{module_link('edu.admin.subscribe.store')}}" method="post">
        @csrf
        @include('edu::admin.subscribe._form')
    </form>
@stop