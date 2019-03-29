@extends('edu::layouts.master')
@section('content')
    <div class="container mt-5">
        <div class="row">
            <div class="col-12 col-sm-12">
                <div class="bg-white p-3 rounded shadow-sm border-gray border">
                    <div class="clearfix border-bottom mb-3">
                        <h6 class="pb-3 pt-3 pl-2 float-left">发表贴子</h6>
                    </div>
                    <form action="{{module_link('edu.front.topic.update',$topic)}}" method="post">
                        @csrf @method("PUT")
                        @include('edu::front.topic._form')
                    </form>
                </div>
            </div>
        </div>
    </div>
@stop