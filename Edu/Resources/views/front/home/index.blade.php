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
                    @include('edu::layouts.activity')
                </div>
            </div>
            <div class="col-sm-3 col-12 pl-sm-2 p-0">
                @include('edu::front.layouts.tip')
                @include('edu::front.layouts.learn')
            </div>
        </div>
    </div>
@stop