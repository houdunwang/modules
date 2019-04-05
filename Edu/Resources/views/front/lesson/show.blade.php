@extends('edu::layouts.master')
@inject('userVideoRepository','Modules\Edu\Repositories\UserVideoRepository')
@inject('ExamRepository','Modules\Edu\Repositories\ExamRepository')
@inject('UserServer','Modules\Edu\Services\UserService')
@section('content')
    @include('components.login')
    <div class="container mt-5">
        <div class="row">
            <div class="col-12 col-sm-9 p-0">
                <div class="bg-white p-sm-5 p-3 rounded shadow-sm border shadow-sm">
                    <div class="mb-3 pb-3">
                        <h3 class="pb-1 pt-3 mb-3 text-monospace text-black-50">
                            {{$lesson['title']}}
                        </h3>
                        <div class="small text-secondary clearfix">
                            <div class="">
                                <div class="btn-group btn-group-sm">
                                    @can('buy',$lesson)
                                        <a href="{{module_link('edu.front.buy.lesson',$lesson)}}"
                                           class="btn btn-outline-success">
                                            <i class="fa fa-shopping-cart"></i> 单独购买课程
                                        </a>
                                        @if ($lesson['subscribe_free_play'])
                                            <a href="/edu/front/subscribe"
                                               class="btn btn-info">
                                                <i class="fa fa-flag"></i> 订阅会员观看全站教程
                                            </a>
                                        @endif
                                    @endcan
                                    @can('update',$lesson)
                                        <a href="{{route('edu.admin.lesson.edit',$lesson)}}"
                                           class="btn btn-outline-secondary">
                                            编辑
                                        </a>
                                        <form action="{{route('edu.front.topic.destroy',$lesson)}}" method="post">
                                            @csrf @method("DELETE")
                                        </form>
                                        <button type="button" class="btn btn-outline-danger"
                                                onclick="destroy(this)">
                                            删除
                                        </button>
                                    @endcan
                                    @can('recommend',$lesson)
                                        <a href="{{route('edu.front.lesson.recommend',$lesson)}}"
                                           class="btn {{$lesson['is_commend']?'btn-outline-success':'btn-outline-secondary'}}">
                                            推荐
                                        </a>
                                    @endcan
                                    {{--                                    @if ($lesson->download_address)--}}
                                    {{--                                        @include('edu::front.layouts.download',['lesson'=>$lesson])--}}
                                    {{--                                        <a href="" class="btn btn-outline-info"--}}
                                    {{--                                           data-toggle="modal" data-target="#downloadModal">--}}
                                    {{--                                            下载高清版--}}
                                    {{--                                        </a>--}}
                                    {{--                                    @endif--}}
                                </div>
                                @include('components.favorite',['model'=>$lesson])
                            </div>
                        </div>
                    </div>
                    <div class="text-black-50 content-markdown markdown bg-white">
                        <div class="list-group list-group-flush">
                            @foreach($videos as $video)
                                <div class="list-group-item d-flex justify-content-between pl-0">
                                    <div>
                                        <a href="{{route('edu.front.video.show',$video)}}" class="text-success1">
                                            {{$video->title}}
                                            @if ($UserServer->videoIsLearn($video,auth()->user()))
                                                <i class="fa fa-check-circle-o text-success"></i>
                                            @endif
                                        </a>
                                    </div>
                                    @if ($video['question'])
                                        <div>
                                            @if ($UserServer->videoIsLearn($video,auth()->user()))
                                                <a href="{{route('edu.front.exam.show',$video)}}"
                                                   class="btn btn-outline-success btn-sm">
                                                    <i class="fa fa-info-circle"></i> 考试
                                                </a>
                                            @else
                                                <a href="{{route('edu.front.exam.show',$video)}}"
                                                   class="btn btn-outline-danger btn-sm">
                                                    <i class="fa fa-info-circle"></i> 考试
                                                </a>
                                            @endif
                                        </div>
                                    @endif
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-3 col-12 p-0 pl-sm-2">
                @include('edu::front.layouts.tip')
                @include('edu::front.layouts.recommend_lesson')
            </div>
        </div>
    </div>
@stop
@push('js')
    <script>
        require(['hdjs', 'marked', 'MarkdownIt', 'highlight'], function (hdjs, marked, MarkdownIt) {
            $('pre code').each(function (i, block) {
                hljs.configure({useBR: false});
                hljs.highlightBlock(block);
            });
        })
    </script>
@endpush