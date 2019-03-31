<?php

namespace Modules\Edu\Http\Controllers\Front;

use App\Servers\ActivityServer;
use Illuminate\Routing\Controller;
use Modules\Edu\Entities\EduTopic;

/**
 * 模块首页
 * Class HomeController
 * @package Modules\Edu\Http\Controllers\Front
 */
class HomeController extends Controller
{
    public function index(ActivityServer $activityServer)
    {
        $topics = EduTopic::where('recommend', 1)->get();
        $activities = $activityServer
            ->getByLogName(
                'edu_topic', 'comment_content', 'edu_sign', 'edu_exam', 'edu_lesson',
                'favour', 'favorite'
            )->latest()->paginate(15);
        return view('edu::front.home.index', compact('activities','topics'));
    }
}
