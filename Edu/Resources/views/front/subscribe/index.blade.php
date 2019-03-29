@extends('edu::layouts.master')
@section('content')
    <div class="subscribe-header shadow-lg">
        <div class="div pt-5 text-center">
            <h1 class="text-white pt-5 mb-4">投资学习会得到加倍的回报</h1>
            <h2 class="text-light font-weight-lighter">
                订阅会员免费观看所有视频
            </h2>
        </div>
    </div>
    <div class="container mb-5 pay">
        <div class="d-flex justify-content-between">
            @foreach($subscribes as $subscribe)
                <div class="card shadow-lg rounded flex-fill mr-3 item">
                    <div class="card-header text-center pb-4 pt-5 bg-white shadow-sm">
                        <i class="fa {{$subscribe['icon']}} fa-4x font-weight-bolder text-primary"></i>
                        <div class="price mt-4">
                            <h1 class="text-dark price font-weight">
                                <span>{{round($subscribe['price'])}}</span>
                                <small class="text-secondary text-black-50">元</small>
                            </h1>
                            <h6>
                                {{$subscribe['title']}}
                            </h6>
                        </div>
                    </div>
                    <div class="card-body p-5 text-center">
                        <h5 class="card-title ad text-center mb-3 text-black-50">
                            {{$subscribe['ad']}}
                        </h5>
                        <a href="{{route('edu.front.subscribe.show',$subscribe)}}"
                           class="btn btn-success ">
                            去支付宝付款
                        </a>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection