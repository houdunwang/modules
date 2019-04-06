@extends('user.layouts.master')
@section('content')
    @include('edu::front.user._favorite_tab')
    <div class="row">
        @foreach($favorites as $favorite)
            <div class="col-12 col-sm-6">
                @include('edu::front.layouts.lesson',['lesson'=>$favorite->belongModel])
            </div>
        @endforeach
    </div>
    <div class="pt-3">
        {{$favorites->appends(['uid'=>$user['id']])->links()}}
    </div>
@endsection