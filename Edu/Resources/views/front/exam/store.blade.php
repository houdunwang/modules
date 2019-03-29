@extends('edu::layouts.master')
@section('content')
    @include('components.login')
    <div class="container mt-5">
        <div class="row">
            @csrf
            <div class="col-12 col-sm-9 p-0">
                <div class="bg-white p-sm-4 p-2 rounded shadow-sm border shadow-sm">
                    <div class="mb-3 pb-3 border-bottom">
                        <h3 class="pb-1 pt-3 mb-3 text-monospace text-black-50">
                            <a href="{{route('edu.front.video.show',$video)}}">
                                《{{$video['formatTitle']}}》
                            </a>
                            的考试成绩: {{$grade['grade']}}分
                        </h3>
                        <div class="text-secondary d-flex justify-content-between">
                            <div>
                                <i class="fa fa-info-circle"></i> 每节课可以参加多次考试，以最后一次考试成绩为主。
                            </div>
                            <div class="btn-group btn-group-sm">
                                <a href="{{route('edu.front.lesson.show',$video->lesson)}}"
                                   class="btn btn-outline-success">
                                    返回课程
                                </a>
                                <a href="{{route('edu.front.video.show',$video)}}"
                                   class="btn btn-outline-info">
                                    观看视频
                                </a>
                            </div>
                        </div>
                    </div>
                    <div>
                        @foreach($video->question as $q=>$question)
                            <div class="card mb-3">
                                <div class="card-header bg-white">
                                    {{$question['title']}}
                                    @if ($grade['answer'][$q])
                                        <i class="fa fa-check-circle-o text-success"></i>
                                    @else
                                        <i class="fa fa-times-circle text-danger"></i>
                                    @endif
                                </div>
                                <div class="card-body">
                                    @foreach($question['topics'] as $t=>$topic)
                                        <label>
                                            <input type="checkbox" name="questions[{{$q}}][]" value="{{$t}}"
                                                    {{active_class($topic['right'],'checked')}}>
                                            <span>{{$topic['topic']}}</span>
                                        </label>
                                        <hr>
                                    @endforeach
                                </div>
                            </div>
                        @endforeach
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