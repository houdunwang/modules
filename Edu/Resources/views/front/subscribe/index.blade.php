@extends('edu::layouts.master')
@section('content')
    <div class="subscribe-header shadow-lg">
        <div class="div pt-5 text-center">
            <h1 class="text-white pt-5 mb-4">投资学习会得到加倍的回报</h1>
            <h2 class="text-light font-weight-light">
                订阅会员免费观看所有视频
            </h2>
        </div>
    </div>
    <div class="container mb-5 pay">
        <div class="row">
            @foreach($subscribes as $subscribe)
                <div class="col-12 col-sm-4">
                    <div class="card shadow-lg rounded flex-fill item mt-2">
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
                </div>
            @endforeach
        </div>
        <div class="text-center mt-3">
            <p class="text-secondary font-weight-lighter">
                <i class="fa fa-info-circle"></i>
                1. 视频属于虚拟物品，购买后不支持退款 2. 支付的费用仅用于观看视频，并不包含其他服务（如在线解答），有问题发到网站我们会尽量帮助解决。
                <br>
                祝你学有所成，加油！
            </p>
        </div>
    </div>
@endsection