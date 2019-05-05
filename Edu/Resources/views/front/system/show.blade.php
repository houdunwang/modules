@extends('edu::layouts.master')
@section('content')
@include('components.login')
<div class="container mt-5">
    <div class="row">
        <div class="col-12 p-0">
            <div class="bg-white p-sm-5 p-3 rounded shadow-sm border shadow-sm">
                <div class="mb-1">
                    <h4 class="pb-1 pt-3 mb-3 text-secondary">
                        {{$system['title']}}
                    </h4>
                    <div class="pb-2 small">
                        创建于{{$system->created_at->diffForHumans()}} <span class="pr-2 pl-2">/</span>
                        更新于{{$system->updated_at->diffForHumans()}}
                    </div>
                    <div class="bg-light p-3 mb-2 mt-2">
                        {{$system['introduce']}}
                    </div>
                    {{-- <div class="text-secondary font-weight-light pt-3" role="alert">
                        <i class="fa fa-info-circle" aria-hidden="true"></i> 系统课程是多套普通课程集合，用于系统掌握一门程序或软件的使用。
                    </div> --}}
                </div>
            </div>

            <div class="bg-white p-sm-5 p-3 rounded shadow-sm border shadow-sm mt-2">
                <h5>课程列表</h5>
                <div class="list-group list-group-flush">
                    @foreach($system->lesson as $lesson)
                    <div class="list-group-item d-flex justify-content-between pl-0">
                        <a href="{{module_link('edu.front.lesson.show',$lesson)}}" class="text-se">
                            {{$lesson->title}}
                        </a>
                        <span class="small float-right text-black-50">
                            <i class="fa fa-video-camera" aria-hidden="true"></i> 共有 {{$lesson->video_num}} 个视频
                        </span>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
@stop
