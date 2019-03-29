@extends('layouts.module')
@section('content')
    <ul class="nav nav-tabs mb-3">
        <li class="nav-item">
            <a href="{{module_link('shop.admin.cms.create')}}" class="nav-link active">生成更新记录</a>
        </li>
    </ul>
    <div class="card">
        <div class="card-header">
            应用列表
        </div>
        <div class="card-body">
            <table class="table">
                <thead>
                <tr>
                    <th>编号</th>
                    <th>编译号</th>
                    <th>更新日志</th>
                    <th>编译时间</th>
                </tr>
                </thead>
                <tbody>
                @foreach($apps as $app)
                    <tr>
                        <td scope="row">{{$app['id']}}</td>
                        <td>{{$app['build']}}</td>
                        <td>{!! implode(',',$app['logs']) !!}</td>
                        <td>{{\Carbon\Carbon::createFromTimestamp($app['build'])}}</td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
    <div class="mt-3">
        {{$apps->links()}}
    </div>
@endsection