@extends('user.layouts.master')
@section('content')
    <h5>
        <i class="fa fa-bars"></i> TA的动态
    </h5>
    <hr>
    @foreach($activities as $activity)
        <div class="pt-2 pb-2 mb-2 border-bottom">
            <div class="row">
                @if ($activity->subject && $activity->subject->getTitle())
                    <div class="col-8">
                        <a href="{{$activity->subject->getLink()}}" class="d-block">
                            {{$activity->subject->getTitle()}}
                        </a>
                    </div>
                    <div class="col-4 text-right small">
                        <i class="fa fa-clock-o"></i> {{$activity->updated_at->diffForHumans()}}
                    </div>
                @endif
            </div>
        </div>
    @endforeach
    <div class="pt-3">
        {{$activities->onEachSide(1)->appends(['uid'=>$user['id']])->links()}}
    </div>
@endsection