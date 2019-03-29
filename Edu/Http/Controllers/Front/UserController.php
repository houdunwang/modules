<?php

namespace Modules\Edu\Http\Controllers\Front;

use App\Servers\ActivityServer;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Modules\Edu\Entities\EduTopic;

/**
 * 个人空间
 * Class UserController
 * @package Modules\Edu\Http\Controllers\Front
 */
class UserController extends Controller
{
    public function activity(ActivityServer $activityServer)
    {
        $user = User::findOrFail(\request('uid'));
        $activities = $activityServer->getByUser($user)->latest()->paginate(15);
        return view('edu::front.user.activity', compact('user', 'activities'));
    }

    public function topic()
    {
        $user = User::findOrFail(\request('uid'));
        $topics= EduTopic::where('user_id',$user['id'])->where('site_id',\site()['id'])->paginate(15);
        return view('edu::front.user.topic', compact('user', 'topics'));
    }
}
