<?php

namespace Modules\Shop\Http\Controllers\Front;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Modules\Shop\Entities\ShopCms;

/**
 * 更新日志
 * Class LogController
 * @package Modules\Shop\Http\Controllers\Front
 */
class LogController extends Controller
{
    /**
     * 更新展示
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $apps = ShopCms::orderBy('id', 'desc')->get();
        $cms = [];
        foreach ($apps as $app) {
            $date = date('Y-m-d', $app['build']);
            $cms[$date] = array_merge($cms[$date] ?? [], $app['logs']);
        }
        return view('shop::front.log.index', compact('cms'));
    }
}
