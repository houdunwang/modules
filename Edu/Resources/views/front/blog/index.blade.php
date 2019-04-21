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
    <div class="container mt-2">
        <div class="row">
            @foreach ($blogs as $blog)
                <div class="col-sm-4 col-12 mt-2">
                    <a href="{{module_link('edu.front.blog.show',$blog)}}">
                        <div class="bg-white shadow rounded">
                            <div class="p-3 mt-3">
                                <h5 class="text-secondary mt-2 pb-3">{{$blog['title']}}</h5>
                                <hr>
                                <div class="text-secondary small text-black-50 pt-1">
                                    <i class="fa fa-user"></i>
                                    <a href="{{route('user.home',$blog->user)}}" class="mr-2">{{$blog->user->name}}</a>
                                    <i class="fa fa-clock-o"></i> {{$blog['created_at']->format('Y-m-d')}}
                                </div>
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