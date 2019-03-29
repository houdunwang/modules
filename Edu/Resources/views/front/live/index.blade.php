@extends('edu::layouts.master')
@inject('tagRepository','Modules\Edu\Repositories\TagRepository')
@section('content')
    @include('edu::front.layouts.live')
        @if (!config_get('Edu.live_state',false))
            <div class="container bg-white border rounded text-center shadow-sm mt-5 mb-2">
            <div class="card-body p-0 p-5 text-center bg-white">
                <h4 class="p-5">
                    直播还没开始呢
                </h4>
            </div>
            </div>
        @endif
    <div class="container bg-white border rounded text-center shadow-sm">
        <div class="mt-0 p-3">
            <i class="fa fa-info-circle"></i> {!! config_get('Edu.live_notice') !!}
            @if (\site()->isManage(auth()->user()))
                <div class="text-center">
                    <a href="{{route('edu.front.live.create')}}" class="btn btn-outline-success btn-sm">
                        直播开关
                    </a>
                </div>
            @endif
        </div>
    </div>
@endsection
@push('js')
    <script>
        require(['hdjs'], function (hdjs) {
            hdjs.scrollTo('body', '#live', 1000, {queue: true});
        });
    </script>
@endpush