@extends('layouts.member')
@section('content')
    @include('shop::member.module._tab')
    <form action="{{route('shop.member.module.store')}}" method="post">
        @csrf
        <div class="card">
            <div class="card-header">选择模块压缩包</div>
            <div class="card-body">
                <div class="form-group">
                    <div class="input-group mb-1">
                        <input type="text" class="form-control" name="zip" readonly="" value="" required>
                        <div class="input-group-append">
                            <button class="btn btn-outline-secondary" onclick="upload_file('zip','zip',{data:{'mode':'local'}})" type="button">
                                选择压缩包文件
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <button class="btn btn-success mt-3">保存上传</button>
    </form>
@endsection