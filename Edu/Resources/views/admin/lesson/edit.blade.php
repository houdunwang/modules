@extends('layouts.module')
@section('content')
<form action="{{module_link('edu.admin.lesson.update',$lesson)}}" method="post">
    @csrf @method('PUT')
    @include('edu::admin.lesson._form',['lesson'=>$lesson])
</form>
@endsection
