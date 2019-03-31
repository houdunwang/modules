@extends('edu::layouts.master')
@section('content')
    @include('components.login')
    <div class="container mt-5">
        <div class="row">
            <div class="col-12 col-sm-9 p-0">
                <div class="bg-white p-sm-5 p-3 rounded shadow-sm border border-gary shadow-sm">
                    <div class="border-bottom mb-3 pb-3">
                        <h3 class="pb-1 pt-3 mb-3 text-monospace text-black-50">
                            {{$topic['title']}}
                        </h3>
                        <div class="small text-secondary clearfix">
                            <div class="float-left pt-2">
                                创建于{{$topic->created_at->diffForHumans()}} <span class="pr-2 pl-2">/</span>
                                评论数 {{$topic->comment_num}} <span class="pr-2 pl-2">/</span>
                                更新于{{$topic->updated_at->diffForHumans()}} <span class="pr-2 pl-2">/</span>
                                收藏数{{$topic->favorite_num}} <span class="pr-2 pl-2">/</span>
                                点赞数 {{$topic->favour_num}}
                            </div>
                            <div class="float-right">
                                <div class="btn-group btn-group-sm">
                                    @can('recommend',$topic)
                                        <a href="{{route('edu.front.topic.recommend',$topic)}}"
                                           class="btn {{$topic['recommend']?'btn-outline-success':'btn-outline-secondary'}}">
                                            推荐
                                        </a>
                                    @endcan
                                    @can('update',$topic)
                                        <a href="{{route('edu.front.topic.edit',$topic)}}"
                                           class="btn btn-outline-success">
                                            编辑
                                        </a>
                                        <form action="{{route('edu.front.topic.destroy',$topic)}}" method="post">
                                            @csrf @method("DELETE")
                                        </form>
                                        <button type="button" class="btn btn-outline-danger" onclick="destroy(this)">
                                            删除
                                        </button>
                                    @endcan
                                </div>
                                @include('components.favorite',['model'=>$topic])
                            </div>
                        </div>
                    </div>
                    <div class="text-black-50 content-markdown markdown bg-white">
                        {!! \Parsedown::instance()->setBreaksEnabled(true)->text($topic['content']) !!}
                    </div>
                    @include('components.favour',['model'=>$topic,'avatar'=>true])
                </div>
                {{--评论--}}
                <div class="mt-2">
                    @include('comment::layouts.comment',['model'=>$topic])
                </div>
            </div>
            <div class="col-sm-3 col-12 p-0 pl-sm-2">
                @include('components.user',['user'=>$topic->user])
                @include('edu::front.layouts.tip')
                @include('edu::front.layouts.new_topic')
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