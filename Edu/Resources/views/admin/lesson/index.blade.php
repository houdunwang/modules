@extends('layouts.module')
@section('content')
    @include('edu::admin.lesson._tab')
    <div class="card">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table">
                    <thead>
                    <tr>
                        <th>编号</th>
                        <th>课程</th>
                        <th>更新时间</th>
                        <th class="text-center">视频数量</th>
                        <th>上架</th>
                        <th>推荐</th>
                        <th>热门</th>
                        <th>免费</th>
                        <th></th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($lessons as $lesson)
                        <tr>
                            <td scope="row">{{$lesson['id']}}</td>
                            <td>
                                {{$lesson['title']}}
                            </td>
                            <td>{{$lesson['updated_at']->format('Y/m/d')}}</td>
                            <td class="text-center">
                                <span class="badge badge-light">
                                    {{$lesson->video_num}}
                                </span>
                            </td>
                            <td>
                                @if($lesson['status'])
                                    <span class="fe fe-check-circle text-info"></span>
                                @else
                                    <span class="fe fe-x-circle"></span>
                                @endif
                            </td>
                            <td>
                                @if($lesson['is_commend'])
                                    <span class="fe fe-check-circle text-info"></span>
                                @else
                                    <span class="fe fe-x-circle"></span>
                                @endif
                            </td>
                            <td>
                                @if($lesson['is_hot'])
                                    <span class="fe fe-check-circle text-info"></span>
                                @else
                                    <span class="fe fe-x-circle"></span>
                                @endif
                            </td>
                            <td>
                                @if($lesson['free'])
                                    <span class="fe fe-check-circle text-info"></span>
                                @else
                                    <span class="fe fe-x-circle"></span>
                                @endif
                            </td>
                            <td class="text-right">
                                <div class="btn-group btn-group-sm" role="group" aria-label="First group">
                                    <a class="btn btn-outline-success"
                                       href="{{route('edu.admin.lesson.edit',$lesson)}}">
                                        编辑
                                    </a>
                                    <a class="btn btn-outline-secondary"
                                       href="{{route('edu.admin.lesson.show',$lesson)}}" target="_blank">
                                        查看
                                    </a>
                                    <form action="{{route('edu.admin.lesson.destroy',$lesson)}}" method="post">
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
    <div class="mt-3">
        {{$lessons->links()}}
    </div>
@endsection
