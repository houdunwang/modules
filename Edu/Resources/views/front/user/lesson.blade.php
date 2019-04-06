@extends('user.layouts.master')
@section('content')
    <link rel="stylesheet" href="{{asset('modules/edu/css/app.css')}}">
    <h5>
        <i class="fa fa-video-camera"></i> TA学习的课程
    </h5>
    <hr>
    <div class="row lessons">
        @foreach($lessons as $lesson)
            <div class="col-12 col-sm-4">
                @include('edu::front.layouts.lesson',$lesson)
            </div>
        @endforeach
    </div>

    <div class="pt-3">
        {{$lessons->appends(['uid'=>$user['id']])->links()}}
    </div>
@endsection