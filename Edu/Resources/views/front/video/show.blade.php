@extends('edu::layouts.master')
@section('content')
    @include('components.login')
    @if ($video->lesson['only_down'])
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="card mt-3 shadow-sm p-5 bg-light rounded">
                        <div class="card-body text-center">
                            <a href="" class="h4 card-title btn btn-info btn-lg"
                               data-toggle="modal" data-target="#downloadModal">
                                请下载观看高清版
                            </a>
                            @include('edu::front.layouts.download',['lesson'=>$video->lesson])
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endif
    @unless($video->lesson['only_down'])
        <div style="background: #313847">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="card border-0">
                            <div class="card-body p-0 video-box">
                                <video playsinline="" webkit-playsinline="" id="video"
                                       class="video-js vjs-big-play-centered VideoSpeed"
                                       controls preload="auto" data-setup="{}"
                                       poster="{{asset('images/system/poster.jpg')}}"
                                       style="width:100%; height:100%;object-fit:fill;background: #313847">
                                    <source src="{{$video['path']}}" type="video/mp4">
                                </video>
                                @push('css')
                                    <style>
                                        .vjs-poster {
                                            background-color: #313847 !important;
                                        }
                                    </style>
                                @endpush
                                @push('js')
                                    <script>
                                        require(['hdjs'], function (hdjs) {
                                            hdjs.video('video');
                                        });
                                    </script>
                                @endpush
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endunless
    <div class="container p-0 p-sm-1">
        <div class="row mt-3">
            <div class="col-12">
                <div class="card-footer text-muted border bg-light mb-2 shadow-sm d-flex justify-content-between p-4">
                    <div>
                        <h5 class="pb-2 text-black-50 text-uppercase">{{$video->title}}</h5>
                        <a href="{{route('edu.front.lesson.show',$video->lesson)}}" class="font-weight-light">
                            <i class="fa fa-folder-o"></i> {{$video->lesson->title}}
                        </a>
                    </div>
                    <div>
                        @if ($video['question'])
                            <a href="{{route('edu.front.exam.show',$video)}}"
                               class="btn btn-outline-success btn-sm">
                                <i class="fa fa-info-circle"></i> 参加考试
                            </a>
                        @endif
                        <div class="btn-group btn-group-sm">
                            @if ($prevVideo = $video->prevVideo)
                                <a href="{{route('edu.front.video.show',$prevVideo)}}"
                                   class="btn btn-outline-success">
                                    上集
                                </a>
                            @endif
                            @if ($nextVideo = $video->nextVideo)
                                <a href="{{route('edu.front.video.show',$nextVideo)}}"
                                   class="btn btn-outline-success">
                                    下集
                                </a>
                            @endif
                            @can('update',$video->lesson)
                                <a href="{{route('edu.admin.lesson.edit',$video->lesson)}}"
                                   class="btn btn-outline-success">
                                    编辑
                                </a>
                                <form action="{{route('edu.front.topic.destroy',$video->lesson)}}" method="post">
                                    @csrf @method("DELETE")
                                </form>
                                <button type="button" class="btn btn-outline-danger"
                                        onclick="destroy(this)">
                                    删除
                                </button>
                            @endcan
                            @if ($video->lesson->download_address)
                                @include('edu::front.layouts.download',['lesson'=>$video->lesson])
                                <a href="" class="btn btn-outline-info"
                                   data-toggle="modal" data-target="#downloadModal">
                                    下载高清版
                                </a>
                            @endif
                        </div>
                        @include('components.favorite',['model'=>$video])
                    </div>
                </div>
            </div>
            <div class="col-12 col-sm-9">
                @include('comment::layouts.comment',['model'=>$video])
            </div>
            <div class="col-12 col-sm-3">
                <div class="card rounded shadow-sm mb-2">
                    <div class="card-header bg-white">
                        <i class="fa fa-check-circle-o"></i> 课程目录
                    </div>
                    <div class="card-body p-0">
                        <div class="list-group list-group-flush">
                            @foreach($videos as $video)
                                <a href="{{route('edu.front.video.show',$video)}}"
                                   class="list-group-item  d-flex justify-content-between">
                                    {{$video->title}}
                                    {{--<i class="fa fa-check-circle-o text-success"></i>--}}
                                </a>
                            @endforeach
                        </div>
                    </div>
                    <div class="card-footer text-muted bg-white text-center">
                        <div class="d-flex justify-content-between">
                            <a href="{{route('edu.front.topic.create')}}"
                               class="btn btn-outline-success btn-sm flex-fill">
                                <i class="fa fa-whatsapp"></i> 发贴交流
                            </a>
                            <a href="{{route('edu.front.sign.index')}}"
                               class="btn btn-outline-danger btn-sm flex-fill ml-2">
                                <i class="fa fa-whatsapp"></i> 签到打卡
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop