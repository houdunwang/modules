@extends('layouts.module')
@section('content')
    <form action="{{route('edu.admin.lesson.store')}}" method="post">
        @csrf
        @include('edu::admin.lesson._form')
    </form>
@endsection
