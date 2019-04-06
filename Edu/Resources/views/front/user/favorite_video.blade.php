@extends('user.layouts.master')
@section('content')
    @include('edu::front.user._favorite_tab')
    @foreach($favorites as $favorite)
        <div class="pt-2 pb-2 mb-2 border-bottom">
            <div class="row">
                <div class="col-8">
                    <a href="{{module_link('edu.front.topic.show',$favorite->belongModel)}}" class="d-block">
                        {{$favorite->belongModel->title}}
                    </a>
                </div>
                <div class="col-4 text-right small">
                    <i class="fa fa-clock-o"></i> {{$favorite->updated_at->diffForHumans()}}
                </div>
            </div>
        </div>
    @endforeach
    <div class="pt-3">
        {{$favorites->onEachSide(1)->appends(['uid'=>$user['id']])->links()}}
    </div>
@endsection