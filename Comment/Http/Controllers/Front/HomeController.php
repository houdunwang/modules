<?php

namespace Modules\Comment\Http\Controllers\Front;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;

class HomeController extends Controller
{
    /**
     * 模块域名访问
     * @return string
     */
    public function index()
    {
        return view('comment::index');
    }
}
