@extends('edu::layouts.master')
@section('content')
    @include('components.login')
    <div class="container mt-5">
        <form action="{{route('edu.front.exam.store',$video)}}" method="post">
            <div class="row">
                @csrf
                <div class="col-12 col-sm-9 p-0">
                    <div class="bg-white p-sm-4 p-2 rounded shadow-sm border shadow-sm">
                        <div class="mb-3 pb-3 border-bottom">
                            <h3 class="pb-1 pt-3 mb-3 text-monospace text-black-50">
                                {{$video['formatTitle']}} 在线考试
                            </h3>
                            <div class="text-secondary clearfix">
                                <i class="fa fa-info-circle"></i> 每节课可以参加多次考试，以最后一次考试成绩为主。
                            </div>
                        </div>
                        <div>
                            @foreach($video->question as $q=>$question)
                                <div class="card mb-3">
                                    <div class="card-header bg-white">
                                        {{$question['title']}}
                                    </div>
                                    <div class="card-body">
                                        @foreach($question['topics'] as $t=>$topic)
                                            <label>
                                                <input type="checkbox" name="questions[{{$q}}][]" value="{{$t}}">
                                                <span>{{$topic['topic']}}</span>
                                            </label>
                                            <hr>
                                        @endforeach
                                    </div>
                                </div>
                            @endforeach
                        </div>
                        <button class="btn btn-success">交卷</button>
                    </div>
                </div>

                <div class="col-sm-3 col-12 p-0 pl-sm-2">
                    @include('edu::front.layouts.tip')
                    @include('edu::front.layouts.recommend_lesson')
                </div>

            </div>
        </form>
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