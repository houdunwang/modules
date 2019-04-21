@extends('edu::layouts.master')
@section('content')
    @include('edu::front.layouts.live')
    <div class="container mt-5">
        <div class="row">
            <div class="col-12 col-sm-9 mb-2 bg-white shadow-sm border-gray border rounded">
                <div class="p-3 pb-3">
                    <h6 class="border-bottom pb-4 pt-3">
                        社区动态
                        <a href="{{route('edu.front.topic.create')}}"
                           class="btn btn-outline-secondary btn-sm float-right">
                            发表
                        </a>
                    </h6>
                    @foreach($topics as $topic)
                        <div class="border-bottom border-gray mb-3">
                            <div class="media text-muted pt-1">
                                <a href="{{route('user.home',$topic->user)}}">
                                    <img src="{{asset($topic->user['avatar'])}}"
                                         class="avatar rounded mt-1">
                                </a>
                                <div class="media-body pb-3 mb-0 small lh-125 pl-3">
                                    <h6 class="">
                                        <a href="{{$topic->getLink()}}"
                                           class="topic-title pb-2 d-inline-block activity-title font-size-15">
                                            《{{$topic->getTitle()}}》
                                        </a>
                                    </h6>
                                    <div>
                                        <span class="small font-weight-light">
                                            于 {{$topic['updated_at']->diffForHumans()}}
                                        </span> .
                                        <span class="small font-weight-light">
                                            评论 {{$topic->comment_num}}
                                        </span> .
                                        <span class="small font-weight-light">
                                            点赞 {{$topic->favour_num}}
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                    @include('edu::layouts.activity')
                </div>
            </div>
            <div class="col-sm-3 col-12 pl-sm-2 p-0">
                @include('edu::front.layouts.tip')
                @include('edu::front.layouts.ad')
                @include('edu::front.layouts.learn')
            </div>
        </div>
    </div>
@stop