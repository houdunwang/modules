<?php
namespace Modules\Article\Http\Controllers\Front;

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
        return '正在使用域名访问模块,当前访问动作: '.__METHOD__;
    }
}
