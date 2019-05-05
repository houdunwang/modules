@extends('layouts.module')
@section('content')
<form action="{{module_link('edu.admin.lesson.store')}}" method="post">
    @csrf
    @include('edu::admin.lesson._form')
</form>
@endsection
