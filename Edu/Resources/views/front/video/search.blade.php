@extends('edu::layouts.master')
@section('content')
    @include('components.login')
    <div class="container mt-5">
        <div class="row">
            <div class="col-12 col-sm-9 p-0">
                <div class="card rounded shadow-sm">
                    <div class="card-header bg-white">
                        视频搜索结果
                    </div>
                    <div class="card-body">
                        <div class="mb-2">
                            <form action="{{module_link('edu.front.lesson.search')}}" method="post">
                                @csrf
                                <div class="input-group input-group input-group-sm">
                                    <input type="text" class="form-control" placeholder="" name="word"
                                           aria-label="Recipient's username with two button addons"
                                           aria-describedby="button-addon4">
                                    <div class="input-group-append" id="button-addon4">
                                        <button class="btn btn-outline-secondary" type="submit" name="type"
                                                value="video">搜索视频
                                        </button>
                                        <button class="btn btn-outline-secondary" type="submit" name="type"
                                                value="lesson">搜索课程
                                        </button>

                                    </div>
                                </div>
                            </form>
                        </div>
                        <div class="list-group list-group-flush">
                            @foreach($videos as $video)
                                <a href="{{route('edu.front.video.show',$video)}}"
                                   class="list-group-item d-flex justify-content-between pl-0">
                                   <span>
                                        {{$video->title}}
                                   </span>
                                </a>
                            @endforeach
                        </div>
                    </div>
                    <div class="card-footer bg-white">
                        {{$videos->links()}}
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