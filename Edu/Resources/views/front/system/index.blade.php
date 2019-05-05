@extends('edu::layouts.master')
@inject('LessonServer', '\Modules\Edu\Repositories\LessonRepository')
@section('content')
<div class="container mt-5 mb-3">
    <div class="card shadow-sm">
        <div class="card-body">
            <h4 class="card-title">系统</h4>
            <p class="card-text">系统课程是多个普通课程的组合，用来全面掌握一门语言或软件的使用，尤其适合刚入门的新手系统牢固的掌握知识。</p>
            <hr>
        </div>
        <div class="card-body">
            <div class="row">
                @foreach($LessonServer->getSystemLesson(3) as $lesson)
                <div class="col-12 col-sm-4">
                    <div class="">
                        <div class="card shadow-sm rounded mb-4 edu-lesson-card">
                            <div class="card-body p-0 thumb border-bottom">
                                <a href="{{route('edu.front.system.show',$lesson)}}">
                                    <img src="{{$lesson['thumb']}}" alt="{{$lesson['title']}}"
                                        class="border-0 p-0 rounded-top">
                                </a>
                            </div>
                            <div class="card-header bg-white border-bottom-0 title">
                                <a href="{{route('edu.front.system.show',$lesson)}}">
                                    {{$lesson['title']}}
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
            <div class="text-center">
                <a href="#" class="btn btn-info">查看更多</a>
            </div>
        </div>
    </div>
    <div class="card shadow-sm mt-5">
        <div class="card-body">
            <h4 class="card-title">课程</h4>
            <p class="card-text">有针对性的对知识点进行讲解，或一个完整的开发项目。</p>

            <hr>
        </div>
        <div class="card-body">
            <div class="row">
                @foreach($LessonServer->news(6) as $lesson)
                <div class="col-12 col-sm-4">
                    <div class="">
                        @include('edu::front.layouts.lesson',$lesson)
                    </div>
                </div>
                @endforeach
            </div>
            <div class="text-center">
                <a href="{{module_link('edu.front.lesson.index')}}" class="btn btn-success">查看更多</a>
            </div>
        </div>
    </div>
</div>
@endsection
