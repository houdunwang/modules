<?php

namespace Modules\Edu\Http\Controllers\Front;

use App\Repositories\FavoriteRepository;
use App\Servers\ActivityServer;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Modules\Edu\Entities\EduTopic;
use Modules\Edu\Entities\EduUserVideo;

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
        $topics = EduTopic::where('user_id', $user['id'])->where('site_id', \site()['id'])->paginate(15);
        return view('edu::front.user.topic', compact('user', 'topics'));
    }

    public function favorite(FavoriteRepository $repository)
    {
        $user = User::findOrFail(\request('uid'));
        $favorites = $repository->lists($user);
        return view('edu::front.user.favorite', compact('user', 'favorites'));
    }

    public function lesson()
    {
        $user = User::findOrFail(\request('uid'));
        $learns = EduUserVideo::with('video')->where('site_id', site()['id'])->latest('id')->paginate('16');
        return view('edu::front.user.learn', compact('user', 'learns'));
    }

    public function follower()
    {
        $user = User::findOrFail(\request('uid'));
        $learns = EduUserVideo::with('video')->where('site_id', site()['id'])->latest('id')->paginate('16');
        return view('edu::front.user.learn', compact('user', 'learns'));
    }

    public function fans()
    {
        $user = User::findOrFail(\request('uid'));
        $learns = EduUserVideo::with('video')->where('site_id', site()['id'])->latest('id')->paginate('16');
        return view('edu::front.user.learn', compact('user', 'learns'));
    }
}
