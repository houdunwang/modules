@extends('layouts.module')
@section('content')
    @include('edu::admin.system._tab')
    <form action="{{module_link('edu.admin.system.store')}}" method="post">
        @csrf
        @include('edu::admin.system._form')
    </form>
@stop