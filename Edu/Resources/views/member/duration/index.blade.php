@extends('layouts.member')
@section('content')
    @if ($duration)
        <div class="card">
            <div class="card-header">
                <h5>会员到期时间</h5>
            </div>
            <div class="card-body">
                {{$duration['begin_time']}} ~ {{$duration['end_time']}}
            </div>
        </div>
    @else
        <div class="card">
            <div class="card-header">
                <i class="fa fa-info-circle"></i> 您还没有订阅学习
            </div>
            <div class="card-body">
                <h3>投资学习会得到加倍的回报</h3>
                <hr>
                <a href="{{route('edu.front.subscribe.index')}}" class="btn btn-success">
                    加入会员提升技能
                </a>
            </div>
        </div>
    @endif
@stop