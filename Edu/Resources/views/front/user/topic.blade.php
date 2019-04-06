@extends('user.layouts.master')
@section('content')
    <h5>
        <i class="fa fa-pencil-square-o"></i> TA的贴子
    </h5>
    <hr>
    @foreach($topics as $topic)
        <div class="pt-2 pb-2 mb-2 border-bottom">
            <div class="row">
                <div class="col-8">
                    <a href="{{module_link('edu.front.topic.show',$topic)}}" class="d-block">
                        {{$topic->title}}
                    </a>
                </div>
                <div class="col-4 text-right small">
                    <i class="fa fa-clock-o"></i> {{$topic->updated_at->diffForHumans()}}
                </div>
            </div>
        </div>
    @endforeach
    <div class="pt-3">
        {{$topics->onEachSide(1)->appends(['uid'=>$user['id']])->links()}}
    </div>
@endsection