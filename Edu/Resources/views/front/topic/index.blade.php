@extends('edu::layouts.master')
@section('content')
    <div class="container mt-5">
        <div class="row">
            <div class="col-12 col-sm-9 mb-sm-5 mb-3 p-0">
                <div class="p-3 pb-3 bg-white shadow-sm border-gray border rounded">
                    <h6 class="border-bottom pb-4 pt-3">
                        话题讨论
{{--                        <a href="{{route('edu.front.topic.create')}}"--}}
{{--                           class="btn btn-outline-secondary btn-sm float-right">--}}
{{--                            发表--}}
{{--                        </a>--}}
                    </h6>
                    <form action="{{module_link('edu.front.topic.search')}}" method="post">
                        @csrf
                        <div class="input-group input-group">
                            <input type="text" class="form-control" placeholder="" name="word"
                                   aria-label="Recipient's username with two button addons"
                                   aria-describedby="button-addon4">
                            <div class="input-group-append" id="button-addon4">
                                <button class="btn btn-outline-info" type="submit">搜索</button>
                                <a href="{{route('edu.front.topic.create')}}" class="btn btn-outline-success">发表</a>
                            </div>
                        </div>
                    </form>
                    <hr>
                    @foreach($topics as $topic)
                        <div class="border-bottom border-gray mb-3">
                            <div class="media text-muted pt-1">
                                <a href="{{module_link('user.home',$topic->user)}}">
                                    <img src="{{asset($topic->user['avatar'])}}" alt="{{$topic->user['name']}}"
                                         class="avatar rounded mt-1">
                                </a>
                                <div class="media-body pb-3 mb-0 small lh-125 pl-3">
                                    <div class="font-weight-normal">
                                        <h6>
                                            <a href="{{route('edu.front.topic.show',$topic)}}"
                                               class="topic-title pb-2 d-inline-block title font-size-15">
                                                {{$topic['title']}}
                                            </a>
                                        </h6>
                                    </div>
                                    <div>
                                        <span class="small font-weight-light">
                                           发表于 {{$topic['updated_at']->diffForHumans()}}
                                        </span> .
                                        <span class="small font-weight-light">
                                            {{$topic->comment_num}}条评论
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                    <div class="mt-4">
                        {{$topics->links()}}
                    </div>
                </div>
            </div>
            <div class="col-sm-3 col-12 p-0 pl-sm-2">
                @include('edu::front.layouts.tip')
            </div>
        </div>
    </div>
@stop