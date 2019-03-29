@extends('layouts.module')
@section('content')
    @include('edu::admin.subscribe._tab')
    <div class="card">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table">
                    <thead>
                    <tr>
                        <th>编号</th>
                        <th>标题</th>
                        <th>广告语</th>
                        <th>价格</th>
                        <th>月数</th>
                        <th></th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($subscribes as $subscribe)
                        <tr>
                            <td>{{$subscribe['id']}}</td>
                            <td>{{$subscribe['title']}}</td>
                            <td>{{$subscribe['ad']}}</td>
                            <td>{{$subscribe['price']}}</td>
                            <td>{{$subscribe['month']}}</td>
                            <td class="text-right">
                                <div class="btn-group btn-group-sm" role="group" aria-label="First group">
                                    <a class="btn btn-outline-success"
                                       href="{{route('edu.admin.subscribe.edit',$subscribe)}}">
                                        编辑
                                    </a>
                                    <form action="{{route('edu.admin.subscribe.destroy',$subscribe)}}" method="post">
                                        @csrf @method('DELETE')
                                    </form>
                                    <a class="btn btn-outline-danger" href="javascript:;" onclick="destroy(this)">
                                        删除
                                    </a>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
