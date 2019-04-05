@extends('edu::layouts.master')
@inject('tagRepository','Modules\Edu\Repositories\TagRepository')
@section('content')
    <div class="container mt-5">
        <div class="row">

            <div class="col-12 bg-white p-3 border rounded shadow-sm">
                <div class="mb-3 pb-1">
                    <form action="{{module_link('edu.front.lesson.search')}}" method="post">
                        @csrf
                        <div class="input-group input-group input-group-sm">
                            <input type="text" class="form-control" placeholder="" name="word"
                                   aria-label="Recipient's username with two button addons"
                                   aria-describedby="button-addon4">
                            <div class="input-group-append" id="button-addon4">
                                <button class="btn btn-outline-secondary" type="submit" name="type" value="lesson">
                                    搜索课程
                                </button>
                                <button class="btn btn-outline-secondary" type="submit" name="type" value="video">搜索视频
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="d-flex justify-content-start flex-wrap">
                    <a href="{{route('edu.front.lesson.index')}}"
                       class="{{active_class(if_route('edu.front.lesson.index'),'active')}}  btn btn-outline-secondary btn-sm mr-3 border-0">
                        全部
                    </a>
                    @foreach($tagRepository->all() as $tag)
                        <a href="{{route('edu.front.lesson.tag',$tag['id'])}}"
                           class="{{active_class(if_route_param('tag',$tag['id']),'active')}} btn btn-outline-secondary btn-sm mr-3 border-0">
                            {{$tag['name']}}
                        </a>
                    @endforeach

                </div>
            </div>
            <div class="col-12 bg-white p-3 border rounded shadow-sm mt-3 lessons pt-3">
                <div class="row">
                    @foreach($lessons as $lesson)
                        <div class="col-12 col-sm-3">
                            <div class="card shadow-sm rounded mb-4">
                                <div class="card-body p-0 thumb border-bottom">
                                    <a href="{{route('edu.front.lesson.show',$lesson)}}">
                                        <img src="{{$lesson['thumb']}}" alt="{{$lesson['title']}}"
                                             class="border-0 p-0 rounded-0">
                                    </a>
                                </div>
                                <div class="card-header bg-white border-bottom-0 title">
                                    <a href="{{route('edu.front.lesson.show',$lesson)}}">
                                        {{$lesson['title']}}
                                    </a>
                                </div>
                                <div class="card-footer d-flex justify-content-between small bg-white">
                                    <div>
                                        <a href="{{route('edu.front.lesson.show',$lesson)}}">
                                            开始学习
                                        </a>
                                    </div>
                                    <div>
                                        <i class="fa fa-film ml-3" aria-hidden="true"></i>
                                        {{$lesson['video_num']??0}} 节课
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
                <div class="border-top pt-4">
                    {{$lessons->onEachSide(1)->links()}}
                </div>
            </div>
        </div>
    </div>
@endsection