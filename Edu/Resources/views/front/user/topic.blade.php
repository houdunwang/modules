@extends('user.layouts.master')
@section('content')
    <h5><i class="fa fa-file"></i> TA的贴子</h5>
    <hr>
    <div class="border-gray mb-3">
        @foreach($topics as $topic)
                <div class="border-bottom border-gray mb-3">
                    <div class="media text-muted pt-1">
                        <div class="media-body pb-3 mb-0 small lh-125 pl-3">
                            <h6 class="float-left">
                                <a href="{{module_link('edu.front.topic.show',$topic)}}">
                                    {{$topic->title}}
                                </a>
                            </h6>
                            <div class="small font-weight-light float-right">
                                <i class="fa fa-clock-o"></i> {{$topic->updated_at->diffForHumans()}}
                            </div>
                        </div>
                    </div>
                </div>
        @endforeach
        {{$topics->appends(['uid'=>$user['id']])->links()}}
    </div>
@endsection