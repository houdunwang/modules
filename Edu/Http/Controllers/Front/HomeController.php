<?php

namespace Modules\Edu\Http\Controllers\Front;

use App\Servers\ActivityServer;
use Illuminate\Routing\Controller;

/**
 * 模块首页
 * Class HomeController
 * @package Modules\Edu\Http\Controllers\Front
 */
class HomeController extends Controller
{
    public function index(ActivityServer $activityServer)
    {
        $activities = $activityServer
            ->getByLogName('edu_topic', 'comment_content', 'edu_sign', 'edu_exam','edu_lesson')
            ->latest()->paginate(15);
        return view('edu::front.home.index', compact('activities'));
    }
}
