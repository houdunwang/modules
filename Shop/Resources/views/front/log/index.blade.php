@extends('shop::layouts.master')
@section('content')
    <div class="container pt-5 mb-5">
        <div class="row">
            <div class="m-auto col-10">
                <div class="card rounded">
                    <div class="card-header">
                        更新日志
                    </div>
                    <div class="card-body">
                        @foreach($cms as $date=>$logs)
                            <h6 class="text-muted">{{$date}}</h6>
                            <ul>
                                @foreach(array_unique($logs) as $log)
                                    <li class="text-secondary">{{$log}}</li>
                                @endforeach
                            </ul>
                            <hr>
                        @endforeach
                    </div>
                </div>
                <div class="mt-2">
{{--                    {{$apps->links()}}--}}
                </div>
            </div>
        </div>
    </div>
@stop