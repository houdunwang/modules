@extends('edu::layouts.master')
@section('content')
    @include('components.login')
    <div class="container mt-5">
        <div class="row">
            <div class="col-12 col-sm-9 p-0">
                <div class="card rounded shadow-sm">
                    <div class="card-header bg-white">
                        最近更新
                    </div>
                    <div class="card-body">
                        <div class="list-group list-group-flush">
                            @foreach($videos as $video)
                                <a href="{{route('edu.front.video.show',$video)}}"
                                   class="list-group-item d-flex justify-content-between pl-0">
                                   <span>
                                        {{$video->formatTitle}}
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