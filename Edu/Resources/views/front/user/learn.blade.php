@extends('user.layouts.master')
@section('content')
    <h5><i class="fa fa-file"></i> TA学习的课程</h5>
    <hr>
    <div class="border-gray mb-3">
        @foreach($learns as $learn)
                <div class="border-bottom border-gray mb-3">
                    <div class="media text-muted pt-1">
                        <div class="media-body pb-3 mb-0 small lh-125 pl-3">
                            <h6 class="float-left">
                                <a href="{{$learn->video->getLink()}}">
                                    {{$learn->video->getTitle()}}
                                </a>
                            </h6>
                            <div class="small font-weight-light float-right">
                                <i class="fa fa-clock-o"></i> {{$learn->updated_at->diffForHumans()}}
                            </div>
                        </div>
                    </div>
                </div>
        @endforeach
        {{$learns->appends(['uid'=>$user['id']])->links()}}
    </div>
@endsection