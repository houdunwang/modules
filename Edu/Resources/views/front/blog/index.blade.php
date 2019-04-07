@extends('edu::layouts.master')
@inject('blogRepository','Modules\Edu\Repositories\BlogRepository')
@section('content')
    <div class="container-fluid bg-white shadow-sm">
        <div class="container pt-5 pb-5">
            <div class="col-12">
                <h1 class="text-red font-weight-bolder">
                    我们的生活日记
                </h1>
                <div class="mt-3">
                    分享生活中的感悟、经验，也可以任何琐碎的生活日常。
                </div>
                <div class="mt-3">
                    <a href="{{module_link('edu.member.blog.create')}}" class="btn btn-outline-info">请开始你的表演</a>
                </div>
            </div>
        </div>
    </div>
    <div class="container mt-5">
        <div class="row">
            @foreach ($blogs as $blog)
                <div class="col-sm-4 col-12 mt-2">
                    <a href="{{module_link('edu.front.blog.show',$blog)}}">
                        <div class="bg-white shadow">
                            <div class="">
                                <img src="{{$blog['thumb']}}" alt="" class="img-thumbnail p-0 border-0 rounded-0"
                                     style="height: 200px;">
                            </div>
                            <div class="p-3 pb-5">
                                <div class="text-red">
                                    {{$blog['created_at']->format('Y-m-d')}}
                                </div>
                                <h5 class="text-secondary mt-2">{{$blog['title']}}</h5>
                            </div>
                        </div>
                    </a>
                </div>
            @endforeach
        </div>
        <div class="mb-5 mt-5">
            {{$blogs->links()}}
        </div>
    </div>
@endsection