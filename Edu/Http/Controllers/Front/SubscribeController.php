<?php

namespace Modules\Edu\Http\Controllers\Front;

use Illuminate\Routing\Controller;
use Modules\Edu\Entities\EduSubscribe;
use Modules\Edu\Services\OrderServer;
use Modules\Edu\Services\UserService;

/**
 * 会员订阅
 * Class SubscribeController
 * @package Modules\Edu\Http\Controllers\Admin
 */
class SubscribeController extends Controller
{
    /**
     * SubscribeController constructor.
     */
    public function __construct()
    {
        $this->middleware('auth', ['only' => 'show']);
    }

    /**
     * 订阅展示
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $subscribes = EduSubscribe::get();
        return view('edu::fro=nt.subscribe.index', compact('subscribes'));
    }

    /**
     * 支付订阅
     * @param EduSubscribe $subscribe
     * @param OrderServer $orderServer
     */
    public function show(EduSubscribe $subscribe, OrderServer $orderServer)
    {
        $orderServer->subscribe($subscribe);
    }
}
